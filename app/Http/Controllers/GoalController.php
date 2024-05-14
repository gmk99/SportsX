<?php

namespace App\Http\Controllers;

use App\Http\Resources\Player;
use App\Models\Goal;
use App\Http\Resources\Goal as GoalResource;
use Illuminate\Http\Request;

class GoalController extends Controller {

    public function index(){
        $goals = Goal::paginate(15);
        return GoalResource::collection($goals);
    }

    public function show($id){
        $goal = Goal::findOrFail( $id );
        return new GoalResource( $goal );
    }

    public function store(Request $request){
        $goal = new Goal;
        $goal->GoallD = $request->input('GoallD');
        $goal->Minute = $request->input('Minute');
        $goal->GameID = $request->input('GameID');
        $goal->PlayerID = $request->input('PlayerID');

        if( $goal->save() ){
            return new GoalResource( $goal );
        }
    }

    public function update(Request $request)
    {
        $goal = Goal::findOrFail( $request->id );
        $goal->GoallD = $request->input('GoallD');
        $goal->Minute = $request->input('Minute');
        $goal->GameID = $request->input('GameID');
        $goal->PlayerID = $request->input('PlayerID');

        if( $goal->save() )
        {
            return new GoalResource($goal);
        }
    }

    public function destroy($id)
    {
        $goal = Goal::findOrFail( $id );
        if( $goal->delete() )
        {
            return new GoalResource( $goal );
        }
    }

    public function bestScorer()
    {
        $players = Player::all();

        $bestScorerName = null;
        $maxGoals = 0;

        foreach ($players as $player) {
            $goals = Goal::where('PlayerID', $player->id)->count();

            if ($goals > $maxGoals) {
                $bestScorerName = $player->Fullname;
                $maxGoals = $goals;
            }
        }

        return [
            'Fullname' => $bestScorerName,
            'total_goals' => $maxGoals,
        ];
    }
}
