<?php namespace App\Http\Controllers;

use App\Models\CoachRole as CoachRole;
use App\Http\Resources\CoachRole as CoachRoleResource;
use Illuminate\Http\Request;

class CoachRoleController extends Controller {
    public function index(){
        $coachRoles = CoachRole::paginate(15);
        return CoachRoleResource::collection($coachRoles);
}

    public function show($id){
        $coachRole = CoachRole::findOrFail( $id );
        return new CoachRoleResource( $coachRole );
    }

    public function store(Request $request){
        $coachRole = new CoachRole;
        $coachRole->Denomination = $request->input('Denomination');

        if( $coachRole->save() ){
            return new CoachRoleResource( $coachRole );
        }
    }

    public function update(Request $request) {
        $coachRole = CoachRole::findOrFail( $request->CoachRoleID );
        $coachRole->CoachRoleID = $request->input('CoachRoleID');
        $coachRole->Denomination = $request->input('Denomination');

        if( $coachRole->save() ) {
            return new CoachRoleResource($coachRole);
        }
    }

    public function destroy($id) {
        $coachRole = CoachRole::findOrFail( $id );
        if( $coachRole->delete() ) {
            return new CoachRoleResource( $coachRole );
        }
    }
}
