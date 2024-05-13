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
        $train->TrainingTypeID = $request->input('TrainingTypeID');
        $train->TrainingDate = $request->input('TrainingDate');
        $train->TrainingTime = $request->input('TrainingTime');
        $train->TrainingDuration = $request->input('TrainingDuration');
        $train->TrainingLocation = $request->input('TrainingLocation');
        if( $train->save() ){
            return new TrainResource( $train );
        }
    }

    public function update(Request $request) {
        $train = Train::findOrFail( $request->input('id') );
        $train->TrainingTypeID = $request->input('TrainingTypeID');
        $train->TrainingDate = $request->input('TrainingDate');
        $train->TrainingTime = $request->input('TrainingTime');
        $train->TrainingDuration = $request->input('TrainingDuration');
        $train->TrainingLocation = $request->input('TrainingLocation');
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