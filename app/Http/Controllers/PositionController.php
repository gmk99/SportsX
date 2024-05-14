<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Resources\Position as PositionResource;
use Illuminate\Http\Request;

class PositionController extends Controller {

    public function index(){
        $positions = Position::paginate(15);
        return PositionResource::collection($positions);
    }

    public function show($id){
        $position = Position::findOrFail( $id );
        return new PositionResource( $position );
    }

    public function store(Request $request){
        $position = new Position;
        $position->PitchPosition = $request->input('PitchPosition');
        $position->Designation = $request->input('Designation');

        if( $position->save() ){
            return new PositionResource( $position );
        }
    }

    public function update(Request $request)
    {
        $position = Position::findOrFail( $request->id );
        $position->PitchPosition = $request->input('PitchPosition');
        $position->Designation = $request->input('Designation');

        if( $position->save() )
        {
            return new PositionResource($position);
        }
    }

    public function destroy($id)
    {
        $position = Position::findOrFail( $id );
        if( $position->delete() )
        {
            return new PositionResource( $position );
        }
    }
}
