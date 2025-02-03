<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomandanController extends Controller
{
    public function index()
    {
        // Menyediakan data hasil survei kepuasan ke view (jika ada data dari model atau database)
        // Misalnya: $data = Survey::all();

        return view('komandan'); // Mengarahkan ke view komandan/index.blade.php
    }
}