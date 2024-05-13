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
        $player->Weight = $request->input('Weight');
        $player->DOB = $request->input('DOB');
        $player->HighSchool = $request->input('HighSchool');
        $player->College = $request->input('College');
        $player->PlayerImage = $request->input('PlayerImage');
        $player->TeamPlayerID = $request->input('TeamPlayerID');

        if( $player->save() ){
            return new PlayerResource( $player );
        }
    }

    public function update(Request $request)
    {
        $player = Player::findOrFail( $request->id );
        $player->TeamID = $request->input('TeamID');
        $player->Name = $request->input('Name');
        $player->Position = $request->input('Position');
        $player->Height = $request->input('Height');
        $player->Weight = $request->input('Weight');
        $player->DOB = $request->input('DOB');
        $player->HighSchool = $request->input('HighSchool');
        $player->College = $request->input('College');
        $player->PlayerImage = $request->input('PlayerImage');
        $player->TeamPlayerID = $request->input('TeamPlayerID');

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
}
