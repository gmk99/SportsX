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
        $game->GameID = $request->input('GameID');
        $game->IsAtHome = $request->input('IsAtHome');
        $game->OpposingTeam = $request->input('OpposingTeam');
        $game->Date = $request->input('Date');
        $game->StartingTime = $request->input('StartingTime');
        $game->GoalsScored = $request->input('GoalsScored');
        $game->GoalsConceded = $request->input('GoalsConceded');
        $game->EndingTime = $request->input('EndingTime');
        $game->FieldFieldID = $request->input('FieldFieldID');
        $game->TeamID = $request->input('TeamID');

        if( $game->save() ){
            return new GameResource( $game );
        }
    }

    public function update(Request $request)
    {
        $game = Game::findOrFail( $request->id );
        $game->GameID = $request->input('GameID');
        $game->IsAtHome = $request->input('IsAtHome');
        $game->OpposingTeam = $request->input('OpposingTeam');
        $game->Date = $request->input('Date');
        $game->StartingTime = $request->input('StartingTime');
        $game->GoalsScored = $request->input('GoalsScored');
        $game->GoalsConceded = $request->input('GoalsConceded');
        $game->EndingTime = $request->input('EndingTime');
        $game->FieldFieldID = $request->input('FieldFieldID');
        $game->TeamID = $request->input('TeamID');

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
