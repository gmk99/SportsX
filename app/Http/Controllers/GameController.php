<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Resources\Game as GameResource;
use Illuminate\Http\Request;
use App\Models\Team;

class GameController extends Controller {

    public function index()
    {
        $games = Game::paginate(15);
        return view('pages.billing', compact('games'));
    }


    public function show($id){
        $game = Game::findOrFail( $id );
        return new GameResource( $game );
    }

    public function store(Request $request)
    {
        $validatedData = $request->validated();

        $game = new Game;
        $game->IsAtHome = $validatedData['IsAtHome'];
        $game->OpposingTeam = $validatedData['OpposingTeam'];
        $game->Date = $validatedData['Date'];
        $game->StartingTime = $validatedData['StartingTime'];
        $game->GoalsScored = $validatedData['GoalsScored'];
        $game->GoalsConceded = $validatedData['GoalsConceded'];
        $game->EndingTime = $validatedData['EndingTime'];
        $game->FieldFieldID = $validatedData['FieldFieldID'];
        $game->TeamID = $validatedData['TeamID'];
        $game->save();

        return redirect()->route('billing')->with('success', 'Game created successfully.');
    }


    public function update(Request $request)
    {
        $game = Game::findOrFail( $request->id );
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

    public function create()
    {
        return view('pages.games-create');
    }

    public function indexFormatted()
    {
        try {
            $games = Game::all();

            $formattedGames = [];

            foreach ($games as $game) {
                $homeTeam = Team::find($game->teamId);
                $homeTeamName = $homeTeam ? $homeTeam->name : null;

                $gameStatus = [
                    'gameId' => $game->id,
                    'opposingTeam' => $game->opposingTeam,
                    'goalsConceded' => $game->goalsConceded,
                    'goalsScored' => $game->goalsScored,
                    'homeTeamName' => $homeTeamName,
                    'isAtHome' => $game->isAtHome ? 'Casa' : 'Fora'
                ];

                $formattedGames[] = $gameStatus;
            }

            return response()->json($formattedGames);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while fetching game data.'], 500);
        }
    }
}
