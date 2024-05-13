<?php namespace App\Http\Controllers;

use App\Models\InjuryPlayerTreatment as InjuryPlayerTreatment;
use App\Http\Resources\InjuryPlayerTreatment as InjuryPlayerTreatmentResource;
use Illuminate\Http\Request;

class InjuryPlayerTreatmentController extends Controller
{
    public function index(){
        $injuryPlayerTreatments = InjuryPlayerTreatment::paginate(15);
        return InjuryPlayerTreatmentResource::collection($injuryPlayerTreatments);
    }

    public function show($id){
        $injuryPlayerTreatment = InjuryPlayerTreatment::findOrFail( $id );
        return new InjuryPlayerTreatmentResource( $injuryPlayerTreatment );
    }

    public function store(Request $request){
        $injuryPlayerTreatment = new InjuryPlayerTreatment;
        $injuryPlayerTreatment->InjuryPlayerTreatmentID = $request->input('InjuryPlayerTreatmentID');
        $injuryPlayerTreatment->InjuryPlayerID = $request->input('InjuryPlayerID');
        $injuryPlayerTreatment->Notes = $request->input('Notes');
        $injuryPlayerTreatment->PhysiotherapistID = $request->input('PhysiotherapistID');

        if( $injuryPlayerTreatment->save() ){
            return new InjuryPlayerTreatmentResource( $injuryPlayerTreatment );
        }
    }

    public function update(Request $request) {
        $injuryPlayerTreatment = InjuryPlayerTreatment::findOrFail( $request->input('id') );
        $injuryPlayerTreatment->InjuryPlayerTreatmentID = $request->input('InjuryPlayerTreatmentID');
        $injuryPlayerTreatment->InjuryPlayerID = $request->input('InjuryPlayerID');
        $injuryPlayerTreatment->Notes = $request->input('Notes');
        $injuryPlayerTreatment->PhysiotherapistID = $request->input('PhysiotherapistID');

        if( $injuryPlayerTreatment->save() ) {
            return new InjuryPlayerTreatmentResource($injuryPlayerTreatment);
        }
    }

    public function destroy($id) {
        $injuryPlayerTreatment = InjuryPlayerTreatment::findOrFail( $id );
        if( $injuryPlayerTreatment->delete() ) {
            return new InjuryPlayerTreatmentResource( $injuryPlayerTreatment );
        }
    }

    public function totalLesoes()
    {
        $total = InjuryPlayerTreatment::count();
        return $total;
    }
}
