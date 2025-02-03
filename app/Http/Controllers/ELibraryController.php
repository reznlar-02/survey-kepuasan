<?php
namespace App\Http\Controllers;

use App\Models\Elibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElibraryController extends Controller
{
    public function index()
{
    $books = Elibrary::paginate(10); // Mengambil data dari tabel `elibraries`
    return view('elibrary.index', compact('books'));
}

    public function create()
    {
        return view('elibrary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'synopsis' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Elibrary::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'synopsis' => $request->synopsis,
            'cover' => $coverPath,
        ]);

        return redirect()->route('elibrary.index')->with('success', 'Book added successfully!');
    }
    public function search(Request $request)
    {
        // Your search logic here
        return view('elibrary.search'); // Return the appropriate view
    }
}