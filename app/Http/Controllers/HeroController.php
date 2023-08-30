<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    // Get all heroes
    public function show()
    {
        $heroes = Hero::all();
        return response()->json($heroes);
    }

    // Create new hero
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'ability' => 'required|in:attacker,defender',
            //'trainer_id' => 'required|exists:trainers,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'starting_power' => 'nullable|numeric',
            'current_power' => 'nullable|numeric',
            'training_count' => 'nullable|numeric',
            'started_training_date' => 'nullable|date',
            'last_training_date' => 'nullable|date',
            'suit_colors' => 'required|string',

        ]);

        $hero = Hero::create($data);
        return response()->json($hero, 201);
    }

    // Get the data of a specific hero
    public function index(Hero $hero)
    {
        return response()->json($hero);
    }

    // Update hero
    public function update(Request $request, Hero $hero)
    {
        $data = $request->validate([
            'name' => 'string',
            'ability' => 'in:attacker,defender',
            'trainer_id' => 'exists:trainers,id',
            'started_training_date' => 'nullable|date',
            'suit_colors' => 'string',
            'starting_power' => 'nullable|numeric',
            'current_power' => 'nullable|numeric',
        ]);

        $hero->update($data);
        return response()->json($hero);
    }

    // Delete hero
    public function delete(Hero $hero)
    {
        $hero->delete();
        return response()->json(['message' => 'Hero deleted']);
    }
}
