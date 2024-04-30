<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = Player::all();
        return view('players.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->level = $request->level;
        $player->goalkeeper = $request->goalkeeper;
        $player->confirmed = $request->confirmed;
        $player->save();

        return redirect('players')->with('message', 'Registro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['entity'] = Player::find($id);
        return view('players.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player = Player::find($id);
        $player->name = $request->name;
        $player->level = $request->level;
        $player->goalkeeper = $request->goalkeeper;
        $player->confirmed = $request->confirmed;
        $player->save();

        return redirect('players')->with('message', 'Registro atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $players = Player::destroy($id);
        return redirect('players')->with('message', 'Registro excluído com sucesso');
    }

    public function confirm(string $id, string $confirmed)
    {
        $players = Player::find($id)->update(['confirmed' => $confirmed]);
        return redirect('players')->with('message', 'Registro atualizado com sucesso');
    }
}
