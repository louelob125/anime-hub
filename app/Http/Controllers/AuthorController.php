<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('author.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pseudonym' => 'required',
            'bio' => 'required',
            'ratings' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request->merge(['image_url' => '/images/'.$imageName]);
        }
    
        $author = Author::create($request->all());
        return redirect()->route('author.index', ['highlight' => $author->id])
                         ->with('success', 'Author added successfully.');
    }
    

    public function show(Author $author)
    {
        return view('author.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'ratings' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request->merge(['image_url' => '/images/'.$imageName]);
        }

        $author->update($request->all());
        return redirect()->route('author.index', ['highlight' => $author->id])
                         ->with('success', 'Author updated successfully.');
    }  

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')
                         ->with('success', 'Author deleted successfully.');
    }
}
