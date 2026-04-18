<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function create(Scholarship $scholarship): View
    {
        abort_unless(in_array($scholarship->status, ['open', 'reviewing'], true), 404);

        return view('user.applications.create', compact('scholarship'));
    }

    public function store(Request $request, Scholarship $scholarship): RedirectResponse
    {
        $validated = $request->validate([
            'personal_statement' => ['required', 'string', 'max:2000'],
            'document' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:4096'],
        ]);

        if (Application::where('user_id', auth()->id())->where('scholarship_id', $scholarship->id)->exists()) {
            return back()->with('error', 'You already submitted an application for this scholarship.');
        }

        $path = $request->file('document')->store('applications', 'public');

        Application::create([
            'user_id' => auth()->id(),
            'scholarship_id' => $scholarship->id,
            'status' => 'pending',
            'remarks' => 'Submitted via SCHOLARIX portal.',
            'personal_statement' => $validated['personal_statement'],
            'document_path' => $path,
            'applied_at' => now(),
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Application submitted successfully.');
    }
}
