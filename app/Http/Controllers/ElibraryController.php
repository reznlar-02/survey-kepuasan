<?php

namespace App\Http\Controllers;

use App\Models\Elibrary;
use Illuminate\Http\Request;

class ElibraryController extends Controller
{
    public function index()
    {
        $books = Elibrary::paginate(10);
        return view('elibrary.index', compact('books'));
    }

    public function create()
    {
        return view('elibrary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $coverImagePath = null;
        if ($request->hasFile('cover')) {
            $storedPath = $request->file('cover')->store('covers', 'public');
            $coverImagePath = 'storage/' . $storedPath;
        }

        Elibrary::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'synopsis' => $request->synopsis,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('elibrary.index')->with('success', 'Book added successfully!');
    }

    public function search(Request $request)
    {
        // Implementasikan logika pencarian sesuai kebutuhan
        return view('elibrary.index', ['books' => Elibrary::paginate(10)]);
    }
}