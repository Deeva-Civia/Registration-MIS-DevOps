<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $total = Registration::count();
        $pending = Registration::where('status', 'pending')->count();
        $approved = Registration::where('status', 'approved')->count();
        $rejected = Registration::where('status', 'rejected')->count();

        $chartData = [
            Registration::where('section', 'Kindergarten')->count(),
            Registration::where('section', 'Elementary')->count(),
            Registration::where('section', 'Middle School')->count(),
            Registration::where('section', 'High School')->count(),
        ];

        $latestRegistrations = Registration::latest()->take(5)->get();

        return view('dashboard', compact('total', 'pending', 'approved', 'rejected', 'chartData', 'latestRegistrations')); 
    }

    public function parentDashboard()
    {
        $registrations = Registration::where('user_id', Auth::id())->latest()->get();
        
        return view('parent-dashboard', compact('registrations')); 
    }
}
