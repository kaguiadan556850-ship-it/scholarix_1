<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ScholarixSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@scholarix.test'],
            [
                'name' => 'Scholarix Admin',
                'first_name' => 'Scholarix',
                'last_name' => 'Admin',
                'student_id' => null,
                'program' => 'System Administration',
                'role' => 'admin',
                'password' => Hash::make('password123'),
            ]
        );

        Scholarship::updateOrCreate(
            ['title' => 'Academic Excellence'],
            [
                'description' => 'For students with outstanding academic performance.',
                'slots' => 50,
                'deadline' => now()->addMonth()->toDateString(),
                'status' => 'open',
            ]
        );

        Scholarship::updateOrCreate(
            ['title' => 'Financial Assistance'],
            [
                'description' => 'Support for students with documented financial need.',
                'slots' => 100,
                'deadline' => now()->addWeeks(6)->toDateString(),
                'status' => 'reviewing',
            ]
        );

        Scholarship::updateOrCreate(
            ['title' => 'Leadership Grant'],
            [
                'description' => 'For student leaders with active campus involvement.',
                'slots' => 20,
                'deadline' => now()->addWeeks(8)->toDateString(),
                'status' => 'closed',
            ]
        );
    }
}
