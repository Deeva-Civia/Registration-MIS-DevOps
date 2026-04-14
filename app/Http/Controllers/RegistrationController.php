<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('parent-registration-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_name'  => 'required|string|max:255',
            'nik'           => 'required|string|size:16|unique:registrations,nik',
            'date_of_birth' => 'required|date',
            'address'       => 'required|string',
            'section'       => 'required|in:Kindergarten,Elementary,Middle School,High School',
            'grade'         => 'required|in:K,1,2,3,4,5,6,7,8,9,10,11,12',
        ]);

        try {
            $validatedData['user_id'] = Auth::id();
            $validatedData['status'] = 'pending';

            Registration::create($validatedData);

            return redirect()->route('parent.dashboard')->with('success', 'Pendaftaran atas nama ' . $validatedData['student_name'] . ' berhasil disubmit dan sedang menunggu verifikasi.');

        } catch (\Exception $e) {
            Log::error('Gagal mendaftarkan siswa: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Terjadi kesalahan sistem saat menyimpan data. Silakan coba beberapa saat lagi.');
        }
    }
}