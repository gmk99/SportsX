<?php namespace App\Http\Controllers;

use App\Models\TeamPlayer as TeamPlayer;
use App\Http\Resources\TeamPlayer as TeamPlayerResource;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function index(){
        $teamPlayers = TeamPlayer::paginate(15);
        return TeamPlayerResource::collection($teamPlayers);
    }

    public function show($id){
        $teamPlayer = TeamPlayer::findOrFail( $id );
        return new TeamPlayerResource( $teamPlayer );
    }

    public function store(Request $request){
        $teamPlayer = new TeamPlayer;
        $teamPlayer->team_id = $request->input('team_id');
        $teamPlayer->player_id = $request->input('player_id');
        $teamPlayer->Number = $request->input('Number');

        if( $teamPlayer->save() ){
            return new TeamPlayerResource( $teamPlayer );
        }
    }

    public function update(Request $request) {
        $teamPlayer = TeamPlayer::findOrFail( $request->input('id') );
        $teamPlayer->team_id = $request->input('team_id');
        $teamPlayer->player_id = $request->input('player_id');
        $teamPlayer->Number = $request->input('Number');

        if( $teamPlayer->save() ) {
            return new TeamPlayerResource($teamPlayer);
        }
    }

    public function destroy($id) {
        $teamPlayer = TeamPlayer::findOrFail( $id );
        if( $teamPlayer->delete() ) {
            return new TeamPlayerResource( $teamPlayer );
        }
    }
}
