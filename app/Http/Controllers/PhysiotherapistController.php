<?php namespace App\Http\Controllers;

use App\Models\Physiotherapist as Physiotherapist;
use App\Http\Resources\Physiotherapist as PhysiotherapistResource;
use Illuminate\Http\Request;

class PhysiotherapistController extends Controller
{
    public function index(){
        $physiotherapists = Physiotherapist::paginate(15);
        return PhysiotherapistResource::collection($physiotherapists);
    }

    public function show($id){
        $physiotherapist = Physiotherapist::findOrFail( $id );
        return new PhysiotherapistResource( $physiotherapist );
    }

    public function store(Request $request){
        $physiotherapist = new Physiotherapist;
        $physiotherapist->FullName = $request->input('FullName');
        $physiotherapist->Birthdate = $request->input('Birthdate');
        $physiotherapist->UsersID = $request->input('UsersID');

        if( $physiotherapist->save() ){
            return new PhysiotherapistResource( $physiotherapist );
        }
    }

    public function update(Request $request) {
        $physiotherapist = Physiotherapist::findOrFail( $request->input('id') );
        $physiotherapist->FullName = $request->input('FullName');
        $physiotherapist->Birthdate = $request->input('Birthdate');
        $physiotherapist->UsersID = $request->input('UsersID');

        if( $physiotherapist->save() ) {
            return new PhysiotherapistResource($physiotherapist);
        }
    }

    public function destroy($id) {
        $physiotherapist = Physiotherapist::findOrFail( $id );
        if( $physiotherapist->delete() ) {
            return new PhysiotherapistResource( $physiotherapist );
        }
    }
}
