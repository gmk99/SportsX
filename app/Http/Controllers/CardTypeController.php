<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Http\Resources\CardType as CardTypeResource;
use Illuminate\Http\Request;

class CardTypeController extends Controller {

    public function index(){
        $cardtypes = CardType::paginate(15);
        return CardTypeResource::collection($cardtypes);
    }

    public function show($id){
        $cardtype = CardType::findOrFail( $id );
        return new CardTypeResource( $cardtype );
    }

    public function store(Request $request){
        $cardtype = new CardType;
        $cardtype->Denomination = $request->input('Denomination');

        if( $cardtype->save() ){
            return new CardtypeResource( $cardtype );
        }
    }

    public function update(Request $request)
    {
        $cardtype = CardType::findOrFail( $request->id );
        $cardtype->CardTypeID = $request->input('CardTypeID');
        $cardtype->Denomination = $request->input('Denomination');


        if( $cardtype->save() )
        {
            return new CardResource($cardtype);
        }
    }

    public function destroy($id)
    {
        $cardtype = CardType::findOrFail( $id );
        if( $cardtype->delete() )
        {
            return new CardTypeResource( $cardtype );
        }
    }
}
