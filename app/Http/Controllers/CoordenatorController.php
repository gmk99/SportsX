<?php namespace App\Http\Controllers;

use App\Models\Coordenator as Coordenator;
use App\Http\Resources\Coordenator as CoordenatorResource;
use Illuminate\Http\Request;

class CoordenatorController extends Controller
{
    public function index(){
        $coordenators = Coordenator::paginate(15);
        return CoordenatorResource::collection($coordenators);
    }

    public function show($id){
        $coordenator = Coordenator::findOrFail( $id );
        return new CoordenatorResource( $coordenator );
    }

    public function store(Request $request){
        $coordenator = new Coordenator;
        $coordenator->CoordenatorID = $request->input('CoordenatorID');
        $coordenator->FullName = $request->input('FullName');
        $coordenator->Birthdate = $request->input('Birthdate');
        $coordenator->LoginEmail = $request->input('LoginEmail');
        $coordenator->ContactID = $request->input('ContactID');

        if( $coordenator->save() ){
            return new CoordenatorResource( $coordenator );
        }
    }

    public function update(Request $request) {
        $coordenator = Coordenator::findOrFail( $request->input('id') );
        $coordenator->CoordenatorID = $request->input('CoordenatorID');
        $coordenator->FullName = $request->input('FullName');
        $coordenator->Birthdate = $request->input('Birthdate');
        $coordenator->LoginEmail = $request->input('LoginEmail');
        $coordenator->ContactID = $request->input('ContactID');

        if( $coordenator->save() ) {
            return new CoordenatorResource($coordenator);
        }
    }

    public function destroy($id) {
        $coordenator = Coordenator::findOrFail( $id );
        if( $coordenator->delete() ) {
            return new CoordenatorResource( $coordenator );
        }
    }
}
