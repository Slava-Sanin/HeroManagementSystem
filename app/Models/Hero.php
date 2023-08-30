<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ability',
        'trainer_id',
        'started_training_date',
        'suit_colors',
        'starting_power',
        'current_power',
        'training_count',
        'last_training_date',
    ];

    // Определение связи с тренером
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
