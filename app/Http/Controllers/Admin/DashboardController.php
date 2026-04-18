<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'activeScholarships' => Scholarship::where('status', 'open')->count(),
            'pendingApplications' => Application::whereIn('status', ['pending', 'under_review'])->count(),
            'approvedApplications' => Application::where('status', 'approved')->count(),
            'scholarships' => Scholarship::latest()->take(6)->get(),
            'recentApplications' => Application::with(['user', 'scholarship'])->latest()->take(8)->get(),
        ]);
    }
}
