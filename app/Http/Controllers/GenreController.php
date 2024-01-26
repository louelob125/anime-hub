<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);
    
        $genre = Genre::create($request->only('name'));  
        return redirect()->route('genre.index', ['highlight' => $genre->id])
                         ->with('success', 'Genre added successfully.');
    }
    
    public function show(Genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'unique:genres,name,' . $genre->id . '|max:255',
        ]);
    
        $genre->update($request->only('name'));
        return redirect()->route('genre.index', ['highlight' => $genre->id])
                         ->with('success', 'Genre updated successfully.');
    }    

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
