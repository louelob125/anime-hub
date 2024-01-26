<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::all();
        return view('platform.index', compact('platforms'));
    }

    public function create()
    {
        return view('platform.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:platforms|max:255',
        ]);
    
        $platform = Platform::create($request->only('name'));  
        return redirect()->route('platform.index', ['highlight' => $platform->id])
                         ->with('success', 'Platform added successfully.');
    }

    public function show(Platform $platform)
    {
        return view('platform.show', compact('platform'));
    }

    public function edit(Platform $platform)
    {
        return view('platform.edit', compact('platform'));
    }

    public function update(Request $request, Platform $platform)
    {
        $request->validate([
            'name' => 'unique:platforms,name,' . $platform->id . '|max:255',
        ]);
    
        $platform->update($request->only('name'));
        return redirect()->route('platform.index', ['highlight' => $platform->id])
                         ->with('success', 'Platform updated successfully.');
    }  

    public function destroy(Platform $platform)
    {
        $platform->delete();
        return redirect()->route('platform.index');
    }
}
