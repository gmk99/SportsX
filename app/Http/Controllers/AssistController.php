<?php

namespace App\Http\Controllers;

use App\Models\Assist;
use App\Http\Resources\Assist as AssistResource;
use Illuminate\Http\Request;

class AssistController extends Controller {

    public function index(){
        $assists = Assist::paginate(15);
        return AssistResource::collection($assists);
    }

    public function show($id){
        $assist = Assist::findOrFail( $id );
        return new AssistResource( $assist );
    }

    public function store(Request $request){
        $assist = new Assist;
        $assist->Minute = $request->input('Minute');
        $assist->GameID = $request->input('GameID');
        $assist->PlayerID = $request->input('PlayerID');
        $assist->GoalID = $request->input('GoalID');

        if( $assist->save() ){
            return new AssistResource( $assist );
        }
    }

    public function update(Request $request)
    {
        $assist = Assist::findOrFail( $request->id );

        $assist->Minute = $request->input('Minute');
        $assist->GameID = $request->input('GameID');
        $assist->PlayerID = $request->input('PlayerID');
        $assist->GoalID = $request->input('GoalID');
        if( $assist->save() )
        {
            return new AssistResource($assist);
        }
    }

    public function destroy($id)
    {
        $assist = Assist::findOrFail( $id );
        if( $assist->delete() )
        {
            return new AssistResource( $assist );
        }
    }
}
