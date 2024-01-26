<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('character.index', compact('characters'));
    }

    public function create()
    {
        return view('character.create');
    }

    public function store(Request $request)
    {
        Character::create($request->all());
        return redirect()->route('character.index');
    }

    public function show(Character $character)
    {
        return view('character.show', compact('character'));
    }

    public function edit(Character $character)
    {
        return view('character.edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $character->update($request->all());
        return redirect()->route('character.index');
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('character.index');
    }
}
