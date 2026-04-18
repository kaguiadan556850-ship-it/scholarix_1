<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'slots' => ['required', 'integer', 'min:1'],
            'deadline' => ['required', 'date'],
            'status' => ['required', 'in:open,reviewing,closed'],
        ]);

        Scholarship::create($validated);

        return back()->with('success', 'Scholarship program created successfully.');
    }

    public function apply(Scholarship $scholarship): RedirectResponse
    {
        $user = auth()->user();

        if ($scholarship->status !== 'open') {
            return back()->with('error', 'This scholarship is not open for applications.');
        }

        Application::firstOrCreate(
            [
                'user_id' => $user->id,
                'scholarship_id' => $scholarship->id,
            ],
            [
                'status' => 'pending',
                'remarks' => 'Submitted via SCHOLARIX portal.',
                'applied_at' => now(),
            ]
        );

        return back()->with('success', 'Application submitted successfully.');
    }

    public function updateStatus(Request $request, Application $application): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        $application->update($validated);

        return back()->with('success', 'Application status updated.');
    }
}
