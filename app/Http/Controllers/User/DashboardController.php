<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $applications = Application::with('scholarship')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.dashboard', [
            'availableScholarships' => Scholarship::where('status', 'open')->latest()->take(4)->get(),
            'applications' => $applications,
        ]);
    }
}
