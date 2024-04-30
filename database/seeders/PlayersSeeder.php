<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 20; $i++) {
            DB::table('players')->insert([
                'name' => Str::random(10),
                'level' => rand(1, 5),
                'goalkeeper' => rand(0, 1),
                'confirmed' => rand(0, 1),
            ]);
        }
    }
}
