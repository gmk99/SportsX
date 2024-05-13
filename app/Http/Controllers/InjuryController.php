<?php namespace App\Http\Controllers;

use App\Models\Injury as Injury;
use App\Http\Resources\Injury as InjuryResource;
use Illuminate\Http\Request;

class InjuryController extends Controller {
    public function index(){
        $injuries = Injury::paginate(15);
        return InjuryResource::collection($injuries);
    }

    public function show($id){
        $injury = Injury::findOrFail( $id );
        return new InjuryResource( $injury );
    }

    public function store(Request $request){
        $injury = new Injury;
        $injury->InjuryID = $request->input('InjuryID');
        $injury->Injury = $request->input('Injury');
        if( $injury->save() ){
            return new InjuryResource( $injury );
        }
    }

    public function update(Request $request) {
        $injury = Injury::findOrFail( $request->InjuryID );
        $injury->Injury = $request->input('Injury');
        if( $injury->save() ) {
            return new InjuryResource($injury);
        }
    }

    public function destroy($id) {
        $injury = Injury::findOrFail( $id );
        if( $injury->delete() ) {
            return new InjuryResource( $injury );
        }
    }
}