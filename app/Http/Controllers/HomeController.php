<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Judge;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Timeline;
use App\Models\AboutImage;
use App\Models\Leaderboard;
use App\Models\RecapImage;
use App\Models\Sponsor;
use App\Models\Rule;
use App\Models\Doorprize;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->ordered()->get();
        $judges = Judge::ordered()->get();
        $galleries = Gallery::ordered()->get();
        $timelines = Timeline::ordered()->get();
        $recapImages = RecapImage::ordered()->get();
        $sponsors = Sponsor::active()->ordered()->get();
        $rules = Rule::active()->ordered()->get();
        $doorprizes = Doorprize::active()->ordered()->get();

        $leaderboard = [
            'top_monthly' => Leaderboard::active()->category('top_monthly')->ordered()->get(),
            'top_fade' => Leaderboard::active()->category('top_fade')->ordered()->get(),
            'best_story' => Leaderboard::active()->category('best_story')->ordered()->get(),
        ];

        $settings = [];
        $keys = ['countdown_deadline', 'prize_total', 'site_name', 'site_tagline', 'hero_subtitle', 'recap_title', 'recap_description', 'recap_highlights', 'recap_button_text', 'recap_button_link', 'rules_pdf'];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key, '');
        }

        return view('welcome', compact('categories', 'judges', 'galleries', 'timelines', 'recapImages', 'sponsors', 'rules', 'doorprizes', 'leaderboard', 'settings'));
    }

    public function about()
    {
        $settings = [];
        $keys = ['site_name', 'site_tagline'];
        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key, '');
        }

        return view('about', compact('settings'));
    }


    public function recap()
    {
        $sponsors = \App\Models\Sponsor::orderBy('sort_order')->get();
        return view('recap', compact('sponsors'));
    }

    public function register()
    {
        $categories = Category::active()->ordered()->get();
        return view('register', compact('categories'));
    }
}
