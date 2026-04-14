<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check-role', function () {
    $role = Auth::user()->role;

    if ($role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('parent.dashboard');
    }
})->middleware(['auth']);

Route::get('/admin/dashboard', function () {
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
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/parent/dashboard', function () {
    $registrations = Registration::where('user_id', Auth::id())->latest()->get();
    
    return view('parent-dashboard', compact('registrations')); 
})->middleware(['auth', 'verified'])->name('parent.dashboard');

Route::get('/parent/register-student', [RegistrationController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('parent.register.student');

Route::post('/parent/register-student', [RegistrationController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('parent.store.student');

require __DIR__.'/auth.php';
