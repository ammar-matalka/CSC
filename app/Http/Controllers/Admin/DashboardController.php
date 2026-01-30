<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Partner;
use App\Models\Solution;
use App\Models\News;
use App\Models\Stat;
use App\Models\Principle;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'partners' => Partner::count(),
            'solutions' => Solution::count(),
            'news' => News::count(),
            'principles' => Principle::count(),
            'stats_count' => Stat::count(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
