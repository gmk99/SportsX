<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Resources\Team as TeamResource;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(){
        $teams = Team::paginate(15);
        return TeamResource::collection($teams);
    }

    public function show($id){
        $team = Team::findOrFail( $id );
        return new TeamResource( $team );
    }

    public function store(Request $request){
        $team = new Team;
        $team->Name = $request->input('Name');
        $team->LevelID = $request->input('LevelID');
        $team->TeamDirectorID = $request->input('TeamDirectorID');

        if( $team->save() ){
            return new TeamResource( $team );
        }
    }

    public function update(Request $request)
    {
        $team = Team::findOrFail( $request->id );
        $team->Name = $request->input('Name');
        $team->LevelID = $request->input('LevelID');
        $team->TeamDirectorID = $request->input('TeamDirectorID');

        if( $team->save() )
        {
            return new TeamResource($team);
        }
    }

    public function destroy($id)
    {
        $team = Team::findOrFail( $id );
        if( $team->delete() )
        {
            return new TeamResource( $team );
        }
    }
}
