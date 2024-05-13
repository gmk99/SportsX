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
        $physiotherapist->PhysiotherapistName = $request->input('PhysiotherapistName');
        $physiotherapist->PhysiotherapistEmail = $request->input('PhysiotherapistEmail');
        $physiotherapist->PhysiotherapistPhone = $request->input('PhysiotherapistPhone');
        if( $physiotherapist->save() ){
            return new PhysiotherapistResource( $physiotherapist );
        }
    }

    public function update(Request $request) {
        $physiotherapist = Physiotherapist::findOrFail( $request->input('id') );
        $physiotherapist->PhysiotherapistName = $request->input('PhysiotherapistName');
        $physiotherapist->PhysiotherapistEmail = $request->input('PhysiotherapistEmail');
        $physiotherapist->PhysiotherapistPhone = $request->input('PhysiotherapistPhone');
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