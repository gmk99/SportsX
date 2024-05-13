<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Resources\Card as CardResource;
use Illuminate\Http\Request;

class CardController extends Controller {

    public function index(){
        $cards = Card::paginate(15);
        return CardResource::collection($cards);
    }

    public function show($id){
        $card = Card::findOrFail( $id );
        return new CardResource( $card );
    }

    public function store(Request $request){
        $card = new Card;
        $card->CardTypeID = $request->input('CardTypeID');
        $card->Denomination = $request->input('Denomination');
        $card->CardID = $request->input('CardID');
        $card->Minute = $request->input('Minute');
        $card->GameID = $request->input('GameID');
        $card->IsAtHome = $request->input('IsAtHome');
        
        if( $card->save() ){
            return new CardResource( $card );
        }
    }

    public function update(Request $request)
    {
        $card = Card::findOrFail( $request->id );
        $card->CardTypeID = $request->input('CardTypeID');
        $card->Denomination = $request->input('Denomination');
        $card->CardID = $request->input('CardID');
        $card->Minute = $request->input('Minute');
        $card->GameID = $request->input('GameID');
        $card->IsAtHome = $request->input('IsAtHome');

        if( $card->save() )
        {
            return new CardResource($card);
        }
    }

    public function destroy($id)
    {
        $card = Card::findOrFail( $id );
        if( $card->delete() )
        {
            return new CardResource( $card );
        }
    }
}