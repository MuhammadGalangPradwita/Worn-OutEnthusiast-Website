<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::ordered()->get();
        return view('admin.timelines.index', compact('timelines'));
    }

    public function create()
    {
        return view('admin.timelines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Timeline::create($validated);

        return redirect()->route('admin.timelines.index')->with('success', 'Timeline milestone added.');
    }

    public function edit(Timeline $timeline)
    {
        return view('admin.timelines.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $timeline->update($validated);

        return redirect()->route('admin.timelines.index')->with('success', 'Timeline milestone updated.');
    }

    public function destroy(Timeline $timeline)
    {
        $timeline->delete();
        return redirect()->route('admin.timelines.index')->with('success', 'Timeline milestone deleted.');
    }
}
