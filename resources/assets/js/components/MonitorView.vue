<template>
    <div id="monitor-wrapper">
        <div id="monitor-inner" class="p-6 text-center">
            <monitor :pings="pings" :range="range"></monitor>
        </div>
    </div>
</template>

<script>
  export default {
    props: {
      all: Boolean
    },
    data() {
      return {
        monitor: Number,
        range: null|String,
        pings: {},
        allOption: null|{}
      }
    },
    created() {
      this.fetchJson();
      if (this.all) {
        this.allMonitors();
      }
    },
    methods: {
      fetchJson() {
        console.log('Fetching JSON....');
        axios.get(route('api.monitors').url()).then(response => {
          this.pings = response.data;
        });
      },
      allMonitors () {
        this.monitor = -1;
        this.allOption = {
          label: 'All Monitors',
          value: -1
        };
      },
      updateMonitor (id) {
        this.monitor = id;
        if (typeof this.monitor !== 'undefined' && this.range) {
          console.log('In updateMonitor IF');
          this.fetchJson();
        }
      },
      updateRange (str) {
        this.range = str;
        if (typeof this.monitor !== 'undefined' && this.range) {
          console.log('In updateRange IF');
          this.fetchJson();
        }
      }
    }
  }
</script>