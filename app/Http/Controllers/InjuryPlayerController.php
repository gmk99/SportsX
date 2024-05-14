<?php namespace App\Http\Controllers;

use App\Models\InjuryPlayer as InjuryPlayer;
use App\Http\Resources\InjuryPlayer as InjuryPlayerResource;
use Illuminate\Http\Request;

class InjuryPlayerController extends Controller
{
    public function index(){
        $injuryPlayers = InjuryPlayer::paginate(15);
        return InjuryPlayerResource::collection($injuryPlayers);
    }

    public function show($id){
        $injuryPlayer = InjuryPlayer::findOrFail( $id );
        return new InjuryPlayerResource( $injuryPlayer );
    }

    public function store(Request $request)
    {
        $injuryPlayer = new InjuryPlayer;
        $injuryPlayer->PlayerID = $request->input('PlayerID');
        $injuryPlayer->InjuryID = $request->input('InjuryID');
        $injuryPlayer->Date = $request->input('Date');
        $injuryPlayer->Observation = $request->input('Observation');

        if( $injuryPlayer->save() ){
            return new InjuryPlayerResource( $injuryPlayer );
        }
    }

    public function update(Request $request)
    {
        $injuryPlayer = InjuryPlayer::findOrFail( $request->input('id') );
        $injuryPlayer->PlayerID = $request->input('PlayerID');
        $injuryPlayer->InjuryID = $request->input('InjuryID');
        $injuryPlayer->Date = $request->input('Date');
        $injuryPlayer->Observation = $request->input('Observation');

        if( $injuryPlayer->save() ) {
            return new InjuryPlayerResource($injuryPlayer);
        }
    }

    public function destroy($id) {
        $injuryPlayer = InjuryPlayer::findOrFail( $id );
        if( $injuryPlayer->delete() ) {
            return new InjuryPlayerResource( $injuryPlayer );
        }
    }
}
