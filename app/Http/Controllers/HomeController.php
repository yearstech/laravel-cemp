<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $chartData = [
            'Jan' => 12,
            'Feb' => 15,
            'Mar' => 20,
        ];
        $yData = array_values($chartData);
        $xData = array_keys($chartData);

        $tiles = [
            [
                'title' => 'Total SRs',
                'value' => (1000),
                'url' => '#',
                'color' => 'info',
                'icon' => 'users',
            ],
            [
                'title' => 'Managers',
                'value' => (20),
                'url' => '#',
                'color' => 'primary',
                'icon' => 'user-gear',
            ],
            [
                'title' => 'Areas',
                'value' => (70),
                'url' => '#',
                'color' => 'secondary',
                'icon' => 'bank',
            ],
            [
                'title' => 'Registered Last Month',
                'value' => (50),
                'url' => '#',
                'color' => 'teal',
                'icon' => 'handshake',
            ],

        ];

        return view('dashboard', compact('tiles', 'xData', 'yData'));
    }
}
