<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Resources\Game as GameResource;
use Illuminate\Http\Request;

class GameController extends Controller {

    public function index(){
        $games = Game::paginate(15);
        return GameResource::collection($games);
    }

    public function show($id){
        $game = Game::findOrFail( $id );
        return new GameResource( $game );
    }

    public function store(Request $request){
        $game = new Game;
        $game->SeasonID = $request->input('SeasonID');
        $game->TeamID = $request->input('TeamID');
        $game->OpponentTeamID = $request->input('OpponentTeamID');
        $game->Date = $request->input('Date');
        $game->GameType = $request->input('GameType');
        $game->Venue = $request->input('Venue');
        $game->Score = $request->input('Score');
        $game->OpponentScore = $request->input('OpponentScore');
        $game->WinLoss = $request->input('WinLoss');
        $game->GameOrder = $request->input('GameOrder');
        $game->SeasonTeamID = $request->input('SeasonTeamID');

        if( $game->save() ){
            return new GameResource( $game );
        }
    }

    public function update(Request $request)
    {
        $game = Game::findOrFail( $request->id );
        $game->SeasonID = $request->input('SeasonID');
        $game->TeamID = $request->input('TeamID');
        $game->OpponentTeamID = $request->input('OpponentTeamID');
        $game->Date = $request->input('Date');
        $game->GameType = $request->input('GameType');
        $game->Venue = $request->input('Venue');
        $game->Score = $request->input('Score');
        $game->OpponentScore = $request->input('OpponentScore');
        $game->WinLoss = $request->input('WinLoss');
        $game->GameOrder = $request->input('GameOrder');
        $game->SeasonTeamID = $request->input('SeasonTeamID');

        if( $game->save() )
        {
            return new GameResource($game);
        }
    }

    public function destroy($id)
    {
        $game = Game::findOrFail( $id );
        if( $game->delete() )
        {
            return new GameResource( $game );
        }
    }
}