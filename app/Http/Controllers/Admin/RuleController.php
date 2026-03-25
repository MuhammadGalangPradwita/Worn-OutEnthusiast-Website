<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RuleController extends Controller
{
    public function index()
    {
        $rulesPdf = Setting::get('rules_pdf', '');
        return view('admin.content.rules', compact('rulesPdf'));
    }

    public function uploadPdf(Request $request)
    {
        $request->validate([
            'rules_pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $oldPdf = Setting::get('rules_pdf', '');
        if ($oldPdf) {
            Storage::disk('public')->delete($oldPdf);
        }

        $path = $request->file('rules_pdf')->store('rules', 'public');
        Setting::set('rules_pdf', $path);

        return redirect()->route('admin.rules.index')->with('success', 'PDF uploaded.');
    }

    public function deletePdf()
    {
        $path = Setting::get('rules_pdf', '');
        if ($path) {
            Storage::disk('public')->delete($path);
            Setting::set('rules_pdf', '');
        }
        return redirect()->route('admin.rules.index')->with('success', 'PDF deleted.');
    }
}
