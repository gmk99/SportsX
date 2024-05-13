<?php namespace App\Http\Controllers;

use App\Models\Train as Train;
use App\Http\Resources\Train as TrainResource;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(){
        $trains = Train::paginate(15);
        return TrainResource::collection($trains);
}

    public function show($id){
        $train = Train::findOrFail( $id );
        return new TrainResource( $train );
    }

    public function store(Request $request){
        $train = new Train;
        $train->TrainID = $request->input('TrainID');
        $train->Day = $request->input('Day');
        $train->StartingTime = $request->input('StartingTime');
        $train->EndingTime = $request->input('EndingTime');
        $train->TeamID = $request->input('TeamID');
        $train->FieldFielID = $request->input('FieldFielID');

        if( $train->save() ){
            return new TrainResource( $train );
        }
    }

    public function update(Request $request) {
        $train = Train::findOrFail( $request->input('id') );
        $train->TrainID = $request->input('TrainID');
        $train->Day = $request->input('Day');
        $train->StartingTime = $request->input('StartingTime');
        $train->EndingTime = $request->input('EndingTime');
        $train->TeamID = $request->input('TeamID');
        $train->FieldFielID = $request->input('FieldFielID');

        if( $train->save() ) {
            return new TrainResource($train);
        }
    }

    public function destroy($id) {
        $train = Train::findOrFail( $id );
        if( $train->delete() ) {
            return new TrainResource( $train );
        }
    }
}
