<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doorprize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoorprizeController extends Controller
{
    public function index()
    {
        $doorprizes = Doorprize::ordered()->get();
        return view('admin.content.doorprizes', compact('doorprizes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rank' => 'required|integer|in:1,2,3',
            'name' => 'required|string|max:255',
            'prize_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Doorprize::create([
            'rank' => $validated['rank'],
            'name' => $validated['name'],
            'prize_amount' => $validated['prize_amount'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.doorprizes.index')->with('success', 'Doorprize added.');
    }

    public function destroy(Doorprize $doorprize)
    {
        if ($doorprize->image_path) {
            Storage::disk('public')->delete($doorprize->image_path);
        }
        $doorprize->delete();
        return redirect()->route('admin.doorprizes.index')->with('success', 'Doorprize deleted.');
    }
}
