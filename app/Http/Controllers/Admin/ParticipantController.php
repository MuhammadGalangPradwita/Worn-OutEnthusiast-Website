<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $query = Participant::with('category')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        $participants = $query->get();
        $counts = [
            'total' => Participant::count(),
            'pending' => Participant::pending()->count(),
            'approved' => Participant::approved()->count(),
        ];

        return view('admin.participants.index', compact('participants', 'counts'));
    }

    public function show(Participant $participant)
    {
        $participant->load('category');
        return view('admin.participants.show', compact('participant'));
    }

    public function updateStatus(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $participant->update($validated);

        return redirect()->route('admin.participants.index')->with('success', "Participant status updated to {$validated['status']}.");
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('admin.participants.index')->with('success', 'Participant deleted successfully.');
    }
}
