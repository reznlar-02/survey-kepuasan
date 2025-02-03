<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormDataDiri;

class DataDiriController extends Controller
{
    public function form()
    {
        return view('questioner.form');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'strata' => 'required|string|max:255',
        'pendidikan' => 'required|string|max:255',
    ]);

    // Simpan data ke database
    FormDataDiri::create($validated);

    // Simpan email ke session untuk melanjutkan
    $request->session()->put('email', $validated['email']);

    return redirect()->route('questioner.index')->with('success', 'Data diri berhasil disimpan.');
}
}