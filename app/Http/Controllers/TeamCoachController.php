<?php namespace App\Http\Controllers;

use App\Models\TeamCoach as TeamCoach;
use App\Http\Resources\TeamCoach as TeamCoachResource;
use Illuminate\Http\Request;

class TeamCoachController extends Controller
{
    public function index(){
        $teamCoaches = TeamCoach::paginate(15);
        return TeamCoachResource::collection($teamCoaches);
    }

    public function show($id){
        $teamCoach = TeamCoach::findOrFail( $id );
        return new TeamCoachResource( $teamCoach );
    }

    public function store(Request $request){
        $teamCoach = new TeamCoach;
        $teamCoach->team_id = $request->input('team_id');
        $teamCoach->coach_id = $request->input('coach_id');
        $teamCoach->CoachRoleID = $request->input('CoachRoleID');

        if( $teamCoach->save() ){
            return new TeamCoachResource( $teamCoach );
        }
    }

    public function update(Request $request) {
        $teamCoach = TeamCoach::findOrFail( $request->input('id') );
        $teamCoach->team_id = $request->input('team_id');
        $teamCoach->coach_id = $request->input('coach_id');
        $teamCoach->CoachRoleID = $request->input('CoachRoleID');

        if( $teamCoach->save() ) {
            return new TeamCoachResource($teamCoach);
        }
    }

    public function destroy($id) {
        $teamCoach = TeamCoach::findOrFail( $id );
        if( $teamCoach->delete() ) {
            return new TeamCoachResource( $teamCoach );
        }
    }
}
