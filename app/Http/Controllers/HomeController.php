<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['totalPlayers'] = Player::count();
        $data['totalPlayersConfirmed'] = Player::where('confirmed', true)->where('goalkeeper', false)->count();
        $data['totalPlayersGoalkeeper'] = Player::where('confirmed', true)->where('goalkeeper', true)->count();
        return view('home', $data);
    }
}
