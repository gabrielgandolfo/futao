<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Models\Player;

Artisan::command('update-players', function () {
    Player::where('confirmed', 1)->update(['confirmed' => 0]);
})->purpose('Jogadores atualizados')->weekly();
