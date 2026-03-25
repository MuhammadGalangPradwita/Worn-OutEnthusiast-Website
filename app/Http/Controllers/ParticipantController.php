<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Category;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'shirt_size' => 'required|string|in:S,M,L,XL,XXL,XXXL',
            'instagram' => 'required|string|max:255',
            'telegram' => 'required|string|max:255',
            'address' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'denim_brand' => 'required|string|max:255',
            'denim_cut' => 'required|string|max:255',
            'denim_weight' => 'required|string|max:255',
            'gdrive_link' => 'required|string',
            'photo_front' => 'required|image|max:5120', // Max 5MB
            'photo_back' => 'required|image|max:5120',
            'payment_proof' => 'required|image|max:5120',
        ]);

        if ($request->hasFile('photo_front')) {
            $validated['photo_front'] = $request->file('photo_front')->store('participants/photos', 'public');
        }
        if ($request->hasFile('photo_back')) {
            $validated['photo_back'] = $request->file('photo_back')->store('participants/photos', 'public');
        }
        if ($request->hasFile('payment_proof')) {
            $validated['payment_proof'] = $request->file('payment_proof')->store('participants/payments', 'public');
        }

        Participant::create($validated);

        return redirect()->route('home', ['#register'])->with('registration_success', 'Pendaftaran berhasil! Tim kami akan segera memproses data Anda.');
    }
}
