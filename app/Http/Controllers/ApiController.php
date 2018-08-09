<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function monitors()
    {
        $data = [
            'cols' => [
                ['label' => 'Date', 'type' => 'datetime'],
                ['label' => 'Packet Loss (%)', 'type' => 'number'],
                ['label' => 'Avg Latency', 'type' => 'number'],
                ['label' => 'Max Latency', 'type' => 'number'],
                ['label' => 'Min Latency', 'type' => 'number']
            ],
            'rows' => [
                [
                    'c' => [
                        ['v' => 'Date(' . 2018 . ', ' . 06 . ', ' . 15 . ', ' . 15 . ', ' . 00 . ', ' . 00 . ')'],
                        ['v' => (int) 0],
                        ['v' => (int) 25],
                        ['v' => (int) 70],
                        ['v' => (int) 20],
                    ]
                ]
            ]

        ];

        return response()->json($data);
    }
}
