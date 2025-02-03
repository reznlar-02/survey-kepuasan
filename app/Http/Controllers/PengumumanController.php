<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Strata;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Method to show the list of announcements
    public function index()
    {
        // Retrieve all pengumuman along with their associated strata data
        $pengumuman = Pengumuman::with('strata')->paginate(10); // You can also use ->get() if pagination is not needed
        $strata = Strata::all(); // Retrieve all strata for filtering purposes

        // Return the view with the data
        return view('pengumuman.index', compact('pengumuman', 'strata'));
    }

    // Method to show the form for creating a new pengumuman
    public function create()
    {
        // Get all strata for the form dropdown
        $strata = Strata::all();
        return view('pengumuman.create', compact('strata')); // Passing strata to the create view
    }

    // Method to store a new pengumuman
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'strata_id' => 'nullable|exists:id,strata', // Validating id_strata (it should exist in the Strata table)
        ]);

        // Create a new pengumuman using the validated request data
        Pengumuman::create($request->all());

        // Redirect to the pengumuman index with a success message
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dibuat!');
    }
}