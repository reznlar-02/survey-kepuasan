<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan; // Pastikan model Kunjungan diimport

class KunjunganController extends Controller
{
    // Menyimpan data kunjungan
    public function store(Request $request)
    {
        // Validasi input data diri
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'strata_id' => 'required|string',
            'pendidikan_id' => 'required|string',
        ]);

        // Menyimpan data ke tabel kunjungan
        $kunjungan = new Kunjungan();
        $kunjungan->nama = $validatedData['nama'];
        $kunjungan->nrp = $validatedData['nrp'];
        $kunjungan->email = $validatedData['email'];
        $kunjungan->strata_id = $validatedData['strata_id'];
        $kunjungan->pendidikan_id = $validatedData['pendidikan_id'];
        $kunjungan->save();

        // Mengarahkan ke halaman berikutnya setelah berhasil disimpan
        return redirect()->route('questioner.index');
    }
}