<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('type.index', compact('types'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:types|max:255',
        ]);
    
        $type = Type::create($request->only('name'));  
        return redirect()->route('type.index', ['highlight' => $type->id])
                         ->with('success', 'Type added successfully.');
    }

    public function show(Type $type)
    {
        return view('type.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'unique:types,name,' . $type->id . '|max:255',
        ]);
    
        $type->update($request->only('name'));
        return redirect()->route('type.index', ['highlight' => $type->id])
                         ->with('success', 'Type updated successfully.');
    } 

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('type.index');
    }
}
