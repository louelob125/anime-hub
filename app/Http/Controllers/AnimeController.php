<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Type;
use App\Models\Platform;
use App\Models\Collection;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index()
    {
        $animes = Anime::all();
        return view('anime.index', compact('animes'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $types = Type::all();
        $platforms = Platform::all();
        $collections = Collection::all();
        return view('anime.create', compact('authors', 'genres', 'types', 'platforms', 'collections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'english_title' => 'required|max:255',
            'japanese_title' => 'required|max:255',
            'author_id' => 'required',
            'genre_id' => 'required',
            'type_id' => 'required',
            'platform_id' => 'required',
            'collection_id' => 'required',
            'ratings' => 'required',
            'synopsis' => 'required',
            'episode_count' => 'required',
            'release_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request->merge(['image_url' => '/images/'.$imageName]);
        }
    
        $anime = Anime::create($request->all());
        return redirect()->route('anime.index', ['highlight' => $anime->id])
                         ->with('success', 'Anime created successfully.');
    }    
    
    public function show(Anime $anime)
    {
        return view('anime.show', compact('anime'));
    }

    public function edit(Anime $anime)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $types = Type::all();
        $platforms = Platform::all();
        $collections = Collection::all();
        return view('anime.edit', compact('anime', 'authors', 'genres', 'types', 'platforms', 'collections'));
    }
    

    public function update(Request $request, Anime $anime)
    {
        $request->validate([
            'english_title' => 'required|max:255',
            'japanese_title' => 'required|max:255',
            'author_id' => 'required',
            'genre_id' => 'required',
            'type_id' => 'required',
            'platform_id' => 'required',
            'collection_id' => 'required',
            'ratings' => 'required',
            'synopsis' => 'required',
            'episode_count' => 'required',
            'release_date' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request->merge(['image_url' => '/images/'.$imageName]);
        }
    
        $anime->update($request->all());
    
        return redirect()->route('anime.index')
                         ->with('success', 'Anime updated successfully.');
    }    

    public function destroy(Anime $anime)
    {
        $anime->delete();
        return redirect()->route('anime.index')
                         ->with('success', 'Anime deleted successfully.');
    }
}
