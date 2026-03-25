<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderboardController extends Controller
{
    public function index()
    {
        $topMonthly = Leaderboard::category('top_monthly')->ordered()->get();
        $topFade = Leaderboard::category('top_fade')->ordered()->get();
        $bestStory = Leaderboard::category('best_story')->ordered()->get();

        return view('admin.content.leaderboard', compact('topMonthly', 'topFade', 'bestStory'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'participant_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'category' => 'required|in:top_monthly,top_fade,best_story',
            'month_label' => 'nullable|string|max:100',
            'rank' => 'nullable|integer|min:1',
            'description' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [
            'participant_name' => $validated['participant_name'],
            'category' => $validated['category'],
            'month_label' => $validated['month_label'] ?? null,
            'rank' => $validated['rank'] ?? 0,
            'description' => $validated['description'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('leaderboard', 'public');
        }

        Leaderboard::create($data);

        return redirect()->route('admin.leaderboard.index')->with('success', 'Entry added successfully.');
    }

    public function destroy(Leaderboard $leaderboard)
    {
        if ($leaderboard->image_path) {
            Storage::disk('public')->delete($leaderboard->image_path);
        }
        $leaderboard->delete();

        return redirect()->route('admin.leaderboard.index')->with('success', 'Entry deleted successfully.');
    }
}
