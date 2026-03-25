<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'galleries' => Gallery::count(),
            'participants' => Participant::count(),
            'pending' => Participant::pending()->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
