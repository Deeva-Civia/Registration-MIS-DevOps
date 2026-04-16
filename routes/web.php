<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
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

// Redirect saat user baru login berdasarkan Role
Route::get('/dashboard', function () {
    $role = Auth::user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('parent.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('admin.dashboard');

// Parent Routes
Route::middleware(['auth', 'verified', 'role:parent'])->group(function () {
    Route::get('/parent/dashboard', [DashboardController::class, 'parentDashboard'])->name('parent.dashboard');
    Route::get('/parent/register-student', [RegistrationController::class, 'create'])->name('parent.register.student');
    Route::post('/parent/register-student', [RegistrationController::class, 'store'])->name('parent.store.student');
});

require __DIR__.'/auth.php';
