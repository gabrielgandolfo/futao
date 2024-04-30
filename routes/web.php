<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('confirm/{player_id}/{confirmed}', [PlayerController::class, 'confirm'])->name('confirm');
    Route::resource('players', PlayerController::class);

    Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('teams', [TeamController::class, 'generate'])->name('teams.generateTeams');
});
