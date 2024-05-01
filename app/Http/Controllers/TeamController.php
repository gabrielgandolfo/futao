<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Collection;


class TeamController extends Controller
{
    public function index()
    {
        $data['totalPlayers'] = Player::where('confirmed', true)->count();
        $data['totalPlayersGoalkeeper'] = Player::where('confirmed', true)->where('goalkeeper', true)->count();
        $data['totalPlayersAllowed'] = floor($data['totalPlayers'] / 2);

        return view('teams.index', $data);
    }

    public function generate(Request $request)
    {
        // Selecionando os jogadores de linha confirmados, ordenando pela qualidade para que fique equilibrado
        // Modifiquei para ordem randomica para não deixar os melhores primeiro ou por ultimo (estou revisando a lógica final)
        $players = Player::where('confirmed', true)
            ->where('goalkeeper', false)
            ->inRandomOrder()
            ->get();

        // Selecionando apenas os goleiros confirmados
        $goalkeepers = Player::where('confirmed', true)
            ->where('goalkeeper', true)
            ->inRandomOrder()
            ->get();

        // Definindo o limite de jogadores por time
        $maxPlayersPerTeam = $request->players;

        // Calculando o total de times com base no número total de jogadores por time
        $totalTeams = ceil((count($players) + count($goalkeepers)) / $maxPlayersPerTeam);

        // Array de times
        $teams = array_fill(0, $totalTeams, []);

        // Distribuindo os goleiros pelos times
        $i = 0;
        foreach ($goalkeepers as $goalkeeper) {
            $teams[$i][] = $goalkeeper;
            $i++;
        }

        $i = 0;
        // Distribuindo os jogadores de linha pelos times
        foreach ($players as $player) {
            // Verifica se o time atual já possui o máximo de jogadores
            // Se o time atual já tiver o máximo jogadores, passa para o próximo time
            if (count($teams[$i]) < $maxPlayersPerTeam) {
                $teams[$i][] = $player;
            } else {
                $i++;
                $teams[$i][] = $player;
            }
        }

        $data['teams'] = $teams;

        return view('teams.generate', $data);
    }
}
