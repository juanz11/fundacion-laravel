<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the user dashboard
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Display user's courses
     */
    public function courses()
    {
        // Por ahora retornamos una vista vacía
        // En el futuro se implementará la lógica de cursos
        return view('user.courses');
    }

    /**
     * Display user's donations list
     */
    public function donations()
    {
        $donations = auth()->user()->donations()
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total_donated' => auth()->user()->donations()->approved()->sum('amount'),
            'total_count' => auth()->user()->donations()->count(),
            'last_donation' => auth()->user()->donations()->approved()->latest()->first(),
        ];

        return view('user.donations', compact('donations', 'stats'));
    }
}
