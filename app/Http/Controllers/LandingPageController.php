<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Partner;
use App\Models\Solution;
use App\Models\News;
use App\Models\Stat;
use App\Models\Principle;
use App\Models\Setting;

class LandingPageController extends Controller
{
    public function index()
    {
        // Get all settings grouped
        $hero = Setting::getByGroup('hero');
        $vision = Setting::getByGroup('vision');
        $contact = Setting::getByGroup('contact');
        $footer = Setting::getByGroup('footer');
        
        // Get active content
        $services = Service::active()->ordered()->get();
        $partners = Partner::active()->ordered()->get();
        $solutions = Solution::active()->ordered()->get();
        $principles = Principle::active()->ordered()->get();
        $stats = Stat::active()->ordered()->get();
        $news = News::active()->latest()->take(3)->get();
        
        return view('landing', compact(
            'hero',
            'vision',
            'contact',
            'footer',
            'services',
            'partners',
            'solutions',
            'principles',
            'stats',
            'news'
        ));
    }
}
