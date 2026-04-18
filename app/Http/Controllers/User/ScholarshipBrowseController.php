<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\View\View;

class ScholarshipBrowseController extends Controller
{
    public function index(): View
    {
        return view('user.scholarships.index', [
            'scholarships' => Scholarship::whereIn('status', ['open', 'reviewing'])
                ->latest()
                ->paginate(9),
        ]);
    }

    public function show(Scholarship $scholarship): View
    {
        return view('user.scholarships.show', compact('scholarship'));
    }
}
