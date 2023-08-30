<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Hero;

class TrainerController extends Controller
{
    public function show(Trainer $trainer)
    {
        return response()->json($trainer);
    }

    // Get the details of a specific trainer
    public function index(Trainer $trainer)
    {
        return response()->json($trainer);
    }

    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->validate([
            'email' => 'email|unique:trainers,email,' . $trainer->id,
            'full_name' => 'string',
        ]);

        $trainer->update($data);
        return response()->json($trainer);
    }

    public function getTrainerHeroes(Trainer $trainer)
    {
        // Checking if a trainer with the given ID exists
        if (!$trainer) {
            abort(404, 'Custom message: Trainer not found');
        }

        $heroes = $trainer->heroes;
        return response()->json($heroes);
    }

    /*public function _unassignHero(Request $request, Trainer $trainer, Hero $hero)
    {
        if ($hero->trainer_id === $trainer->id) {
            $hero->update([
                'trainer_id' => null,
            ]);
        }

        return response()->json(['message' => 'Hero unassigned from trainer']);
    }*/

    public function assignHero(Request $request, $trainerId, $heroId)
    {
        // Find trainer by ID
        $trainer = Trainer::find($trainerId);

        if (!$trainer) {
            return response()->json(['message' => 'Trainer not found'], 404);
        }

        // Find hero by ID
        $hero = Hero::find($heroId);

        if (!$hero) {
            return response()->json(['message' => 'Hero not found'], 404);
        }

        // Checking that the hero is not yet linked to another trainer
        if ($hero->trainer_id !== 0) {
            return response()->json(['message' => 'Hero is already assigned to another trainer'], 400);
        }

        // Link a hero to a trainer
        $hero->trainer_id = $trainer->id;
        $hero->save();

        return response()->json(['message' => 'Hero assigned to trainer']);
    }

    public function unassignHero(Request $request, $trainerId, $heroId)
    {
        // Find a trainer by ID
        $trainer = Trainer::find($trainerId);

        if (!$trainer) {
            return response()->json(['message' => 'Trainer not found'], 404);
        }

        // Search for a hero from a trainer
        $hero = $trainer->heroes()->find($heroId);

        if (!$hero) {
            return response()->json(['message' => 'Hero not found for this trainer'], 404);
        }

        // Unlink a hero from a trainer
        $hero->trainer_id = 0;
        $hero->save();

        return response()->json(['message' => 'Hero unassigned from trainer']);
    }

}
