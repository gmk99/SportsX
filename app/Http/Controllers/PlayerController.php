<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use Illuminate\Http\Request;

class PlayerController extends Controller {

    public function index(){
        $players = Player::paginate(15);
        return PlayerResource::collection($players);
    }

    public function show($id){
        $player = Player::findOrFail( $id );
        return new PlayerResource( $player );
    }

    public function store(Request $request){
        $player = new Player;
        $player->FullName = $request->input('FullName');
        $player->Birthdate = $request->input('Birthdate');
        $player->AssociationNumber = $request->input('AssociationNumber');
        $player->ContactID = $request->input('ContactID');
        $player->PositionID = $request->input('PositionID');
        $player->PlayerID = $request->input('PlayerID');

        if( $player->save() ){
            return new PlayerResource( $player );
        }
    }

    public function update(Request $request)
    {
        $player = Player::findOrFail( $request->id );
        $player->FullName = $request->input('FullName');
        $player->Birthdate = $request->input('Birthdate');
        $player->AssociationNumber = $request->input('AssociationNumber');
        $player->ContactID = $request->input('ContactID');
        $player->PositionID = $request->input('PositionID');
        $player->PlayerID = $request->input('PlayerID');

        if( $player->save() )
        {
            return new PlayerResource($player);
        }
    }

    public function destroy($id)
    {
        $player = Player::findOrFail( $id );
        if( $player->delete() )
        {
            return new PlayerResource( $player );
        }
    }

    public function total()
    {
        $total = Player::count();
        return $total;
    }
}
