<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScholarshipManagementController extends Controller
{
    public function index(): View
    {
        return view('admin.scholarships.index', [
            'scholarships' => Scholarship::withCount('applications')->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.scholarships.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'numeric', 'min:0'],
            'slots' => ['required', 'integer', 'min:1'],
            'deadline' => ['required', 'date'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,open,reviewing,closed'],
        ]);

        $validated['created_by'] = auth()->id();

        Scholarship::create($validated);

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship created successfully.');
    }

    public function edit(Scholarship $scholarship): View
    {
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, Scholarship $scholarship): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:100'],
            'amount' => ['required', 'numeric', 'min:0'],
            'slots' => ['required', 'integer', 'min:1'],
            'deadline' => ['required', 'date'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'status' => ['required', 'in:draft,open,reviewing,closed'],
        ]);

        $scholarship->update($validated);

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship updated successfully.');
    }

    public function destroy(Scholarship $scholarship): RedirectResponse
    {
        $scholarship->delete();

        return redirect()->route('admin.scholarships.index')->with('success', 'Scholarship deleted successfully.');
    }

    public function updateApplicationStatus(Request $request, Application $application): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,under_review,approved,rejected'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['reviewed_at'] = now();

        $application->update($validated);

        return back()->with('success', 'Application status updated.');
    }
}
