<?php

namespace App\Http\Controllers;

use App\Models\GamePlayer;
use App\Http\Resources\GamePlayer as GamePlayerResource;
use Illuminate\Http\Request;

class GamePlayerController extends Controller
{

    public function index()
    {
        $gamePlayers = GamePlayer::paginate(15);
        return GamePlayerResource::collection($gamePlayers);
    }

    public function show($id)
    {
        $gamePlayer = GamePlayer::findOrFail($id);
        return new GamePlayerResource($gamePlayer);
    }

    public function store(Request $request)
    {
        $gamePlayer = new GamePlayer;
        $gamePlayer->IsStarter = $request->input('IsStarter');
        $gamePlayer->Minutes = $request->input('Minutes');

        if ($gamePlayer->save()) {
            return new GamePlayerResource($gamePlayer);
        }
    }

    public function update(Request $request)
    {
        $gamePlayer = GamePlayer::findOrFail($request->id);
        $gamePlayer->IsStarter = $request->input('IsStarter');
        $gamePlayer->Minutes = $request->input('Minutes');

        if ($gamePlayer->save()) {
            return new GamePlayerResource($gamePlayer);
        }
    }

    public function destroy($id)
    {
        $gamePlayer = GamePlayer::findOrFail($id);
        if ($gamePlayer->delete())
        {
            return new GamePlayerResource($gamePlayer);
        }
    }
}
