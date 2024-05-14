<?php namespace App\Http\Controllers;

use App\Models\TeamDirector as TeamDirector;
use App\Http\Resources\TeamDirector as TeamDirectorResource;
use Illuminate\Http\Request;

class TeamDirectorController extends Controller
{
    public function index(){
        $teamDirectors = TeamDirector::paginate(15);
        return TeamDirectorResource::collection($teamDirectors);
    }

    public function show($id){
        $teamDirector = TeamDirector::findOrFail( $id );
        return new TeamDirectorResource( $teamDirector );
    }

    public function store(Request $request){
        $teamDirector = new TeamDirector;
        $teamDirector->FullName = $request->input('FullName');
        $teamDirector->Birthdate = $request->input('Birthdate');
        $teamDirector->UsersID = $request->input('UsersID');

        if( $teamDirector->save() ){
            return new TeamDirectorResource( $teamDirector );
        }
    }

    public function update(Request $request) {
        $teamDirector = TeamDirector::findOrFail( $request->input('id') );
        $teamDirector->FullName = $request->input('FullName');
        $teamDirector->Birthdate = $request->input('Birthdate');
        $teamDirector->UsersID = $request->input('UsersID');

        if( $teamDirector->save() ) {
            return new TeamDirectorResource($teamDirector);
        }
    }

    public function destroy($id) {
        $teamDirector = TeamDirector::findOrFail( $id );
        if( $teamDirector->delete() ) {
            return new TeamDirectorResource( $teamDirector );
        }
    }
}
