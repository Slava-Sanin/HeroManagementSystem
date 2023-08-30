<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\TrainerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/heroes', [HeroController::class, 'show']);

Route::get('/heroes/create', [HeroController::class, 'create']);
Route::get('/heroes/{hero}', [HeroController::class, 'index']);
//Route::get('/heroes/update/{hero}', [HeroController::class, 'update']);

Route::get('/trainers/{trainer}', [TrainerController::class, 'index']);
//Route::get('/trainer/edit', 'TrainerController@edit');
Route::get('/trainer/{trainer}/assign/{hero}', [TrainerController::class, 'assignHero']);
Route::get('/trainer/{trainer}/unassign/{hero}', [TrainerController::class, 'unassignHero']);
Route::get('/trainers/update/{trainer}', [TrainerController::class, 'update']);
Route::get('/trainers/{trainer}/heroes', [TrainerController::class, 'getTrainerHeroes']);
