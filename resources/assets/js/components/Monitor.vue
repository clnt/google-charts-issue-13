<template>
    <div id="monitors">

    </div>
</template>

<script>
    import {GoogleCharts} from 'google-charts';
  export default {
    props: {
      pings: [Object, Number],
      range: [String, Number]
    },
    watch: {
      pings: function(oldVal, newVal) {
        console.log('Pings Have Changed');
        this.draw();
      }
    },
    data() {
      return {
        chartDiv: 'monitors',
        timeFormat: 'H:mm',
        options: {
          width: '100%',
          height: 300,
          chartArea: {
            left: 50,
            width: '90%',
          },
          hAxis: {
            format: this.timeFormat,
            textPosition: 'out',
            gridlines: {
              count: 100
            },
            minorGridlines: {
              count: 3
            }
          },
          vAxes: {
            0: {
              logScale: false,
              direction: -1,
              title: "Packet Loss (%)",
              textStyle: {
                color: '#005500',
                fontSize: '9',
                paddingRight: '0',
                marginRight: '0'
              },
              gridlines: {
                count: -1,
                color: 'transparent'
              },
              viewWindowMode: 'explicit',
              viewWindow: {
                min: 1,
                max: 100
              }
            },
            1: {
              logScale: false,
              title: "Latency (ms)",
              textStyle: {
                color: '#005500',
                fontSize: '9',
                paddingRight: '0',
                marginRight: '0'
              },
              gridlines: {
                color: 'transparent'
              },
              format: '#',
              interpolateNulls: false,
              viewWindowMode: 'pretty',
              viewWindow: {
                min: 0
              }
            }
          },
          series: {
            0: {
              targetAxisIndex: 0,
              color: 'red',
              areaOpacity: 1,
              lineWidth: 1
            },
            1: {
              targetAxisIndex: 1,
              color: 'lime',
              areaOpacity: 0,
              lineWidth: 1
            },
            2: {
              targetAxisIndex: 1,
              color: 'blue',
              areaOpacity: 0,
              lineWidth: 1
            },
            3: {
              targetAxisIndex: 1,
              color: 'yellow',
              areaOpacity: 0,
              lineWidth: 1
            }
          }
        }
      }
    },
    methods: {
      draw() {
        GoogleCharts.load(this.drawChart());
      },
      drawChart () {
        let chart = new GoogleCharts.api.visualization.AreaChart(document.getElementById(this.chartDiv));
        chart.draw(this.pings, this.options);
      },
      drawMultiChart () {

      }
    }
  }
</script>