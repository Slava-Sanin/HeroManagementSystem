<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\TrainerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::post('register', 'AuthController@register');
Route::post('register', [AuthController::class, 'register']);
//Route::post('login', 'AuthController@login');
Route::post('login', [AuthController::class, 'login']);
/*
//Route::middleware('auth:jwt')->group(function () {
    // Hero routes
    //Route::apiResource('heroes', 'HeroController');
    //Route::get('trainers/{trainer}/heroes', 'TrainerController@getHeroes');
    Route::get('heroes', 'HeroController@show');
    Route::post('heroes', 'HeroController@store');
    Route::put('heroes/{hero}', 'HeroController@update');
    Route::delete('heroes/{hero}', 'HeroController@destroy');

    // Trainer routes
    //Route::get('trainer', 'TrainerController@show');
    //Route::put('trainer', 'TrainerController@update');
    //Route::delete('trainer/heroes/{hero}', 'TrainerController@unassignHero');
    // Маршруты для авторизованных пользователей
    Route::prefix('trainers')->group(function () {
        Route::get('{trainer}', [TrainerController::class, 'index']);
        Route::put('/update/{trainer}', [TrainerController::class, 'update']);
    });
//});*/

Route::get('/heroes', [HeroController::class, 'show']);

Route::post('/heroes/create', [HeroController::class, 'create']);
Route::get('/heroes/{hero}', [HeroController::class, 'index']);
//Route::get('/heroes/update/{hero}', [HeroController::class, 'update']);

Route::get('/trainers/{trainer}', [TrainerController::class, 'index']);
//Route::get('/trainer/edit', 'TrainerController@edit');
Route::get('/trainer/{trainerId}/assign/{heroId}', [TrainerController::class, 'assignHero']);
Route::get('/trainer/{trainerId}/unassign/{heroId}', [TrainerController::class, 'unassignHero']);
Route::get('/trainers/update/{trainer}', [TrainerController::class, 'update']);
Route::get('/trainers/{trainer}/heroes', [TrainerController::class, 'getTrainerHeroes']);
