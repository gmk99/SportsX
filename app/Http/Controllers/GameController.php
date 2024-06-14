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
        $game = Game::findOrFail($id);
        return new GameResource($game);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IsAtHome' => 'required|boolean',
            'OpposingTeam' => 'required|string|max:255',
            'Date' => 'required|date',
            'StartingTime' => 'required|date_format:H:i',
            'GoalsScored' => 'required|integer',
            'GoalsConceded' => 'required|integer',
            'EndingTime' => 'required|date_format:H:i',
            'FieldFieldID' => 'required|integer',
            'TeamID' => 'required|integer|exists:Team,id'
        ]);

        $game = new Game;
        $game->IsAtHome = $validatedData['IsAtHome'];
        $game->OpposingTeam = $validatedData['OpposingTeam'];
        $game->Date = $validatedData['Date'];
        $game->StartingTime = $validatedData['Date'] . ' ' . $validatedData['StartingTime'] . ':00'; // Combine date and time
        $game->GoalsScored = $validatedData['GoalsScored'];
        $game->GoalsConceded = $validatedData['GoalsConceded'];
        $game->EndingTime = $validatedData['Date'] . ' ' . $validatedData['EndingTime'] . ':00'; // Combine date and time
        $game->FieldFieldID = $validatedData['FieldFieldID'];
        $game->TeamID = $validatedData['TeamID'];
        $game->save();

        return redirect()->route('billing')->with('success', 'Game created successfully.');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'IsAtHome' => 'required|boolean',
            'OpposingTeam' => 'required|string|max:255',
            'Date' => 'required|date',
            'StartingTime' => 'required|date_format:H:i',
            'GoalsScored' => 'required|integer',
            'GoalsConceded' => 'required|integer',
            'EndingTime' => 'required|date_format:H:i',
            'FieldFieldID' => 'required|integer',
            'TeamID' => 'required|integer|exists:Team,id'
        ]);

        $game = Game::findOrFail($request->id);
        $game->IsAtHome = $validatedData['IsAtHome'];
        $game->OpposingTeam = $validatedData['OpposingTeam'];
        $game->Date = $validatedData['Date'];
        $game->StartingTime = $validatedData['Date'] . ' ' . $validatedData['StartingTime'] . ':00'; // Combine date and time
        $game->GoalsScored = $validatedData['GoalsScored'];
        $game->GoalsConceded = $validatedData['GoalsConceded'];
        $game->EndingTime = $validatedData['Date'] . ' ' . $validatedData['EndingTime'] . ':00'; // Combine date and time
        $game->FieldFieldID = $validatedData['FieldFieldID'];
        $game->TeamID = $validatedData['TeamID'];

        if ($game->save()) {
            return new GameResource($game);
        }
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        if ($game->delete()) {
            return new GameResource($game);
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
                $homeTeam = Team::find($game->TeamID);
                $homeTeamName = $homeTeam ? $homeTeam->name : null;

                $gameStatus = [
                    'gameId' => $game->id,
                    'opposingTeam' => $game->OpposingTeam,
                    'goalsConceded' => $game->GoalsConceded,
                    'goalsScored' => $game->GoalsScored,
                    'homeTeamName' => $homeTeamName,
                    'isAtHome' => $game->IsAtHome ? 'Casa' : 'Fora'
                ];

                $formattedGames[] = $gameStatus;
            }

            return response()->json($formattedGames);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while fetching game data.'], 500);
        }
    }
}
