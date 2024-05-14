<?php namespace App\Http\Controllers;

use App\Models\Coach as Coach;
use App\Http\Resources\Coach as CoachResource;
use Illuminate\Http\Request;

class CoachController extends Controller {
    public function index(){
        $coaches = Coach::paginate(15);
        return CoachResource::collection($coaches);
    }

    public function show($id){
        $coach = Coach::findOrFail( $id );
        return new CoachResource( $coach );
    }

    public function store(Request $request){
        $coach = new Coach;
        $coach->FullName = $request->input('FullName');
        $coach->Birthdate = $request->input('Birthdate');
        $coach->Degree = $request->input('Degree');
        $coach->AssociationNumber = $request->input('AssociationNumber');


        if( $coach->save() ){
            return new CoachResource( $coach );
        }
    }

    public function update(Request $request) {
        $coach = Coach::findOrFail( $request->CoachID );
        $coach->CoachID = $request->input('CoachID');
        $coach->FullName = $request->input('FullName');
        $coach->Birthdate = $request->input('Birthdate');
        $coach->Degree = $request->input('Degree');
        $coach->AssociationNumber = $request->input('AssociationNumber');

        if( $coach->save() ) {
            return new CoachResource($coach);
        }
    }

    public function destroy($id) {
        $coach = Coach::findOrFail( $id );
        if( $coach->delete() ) {
            return new CoachResource( $coach );
        }
    }
}
