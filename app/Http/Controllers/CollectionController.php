<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return view('collection.index', compact('collections'));
    }

    public function create()
    {
        return view('collection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:collections|max:255',
        ]);
    
        $collection = Collection::create($request->only('name'));
        return redirect()->route('collection.index', ['highlight' => $collection->id])
                         ->with('success', 'Collection added successfully.');
    }

    public function show(Collection $collection)
    {
        return view('collection.show', compact('collection'));
    }

    public function edit(Collection $collection)
    {
        return view('collection.edit', compact('collection'));
    }

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'unique:collections,name,' . $collection->id . '|max:255',
        ]);
    
        $collection->update($request->only('name'));
        return redirect()->route('collection.index', ['highlight' => $collection->id])
                         ->with('success', 'Collection updated successfully.');
    }    

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('collection.index');
    }
}
