<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'full_name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Determining the connection with the heroes
    public function heroes()
    {
        return $this->hasMany(Hero::class);
    }
}
