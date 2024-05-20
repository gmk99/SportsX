<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Requests\PlayerRequest;
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

    public function store(PlayerRequest $request)
    {
        $player = Player::create($request->validated());

        return response()->json($player, 201);

        /*$player = new Player;
        $player->FullName = $request->input('FullName');
        $player->Birthdate = $request->input('Birthdate');
        $player->AssociationNumber = $request->input('AssociationNumber');
        $player->PhoneNumber = $request->input('PhoneNumber');
        $player->PositionID = $request->input('PositionID');

        if( $player->save() ){
            return new PlayerResource( $player );
        }*/
    }

    public function update(PlayerRequest $request)
    {
        $player = Player::findOrFail( $request->id );
        $player->FullName = $request->input('FullName');
        $player->Birthdate = $request->input('Birthdate');
        $player->AssociationNumber = $request->input('AssociationNumber');
        $player->PhoneNumber = $request->input('PhoneNumber');
        $player->PositionID = $request->input('PositionID');

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

    public function totalPlayers()
    {
        $total = Player::count();
        return $total;
    }

    public function getTopScorerName()
    {
        $topScorer = $this->getTopScorer();

        if ($topScorer) {
            return response()->json(['name' => $topScorer->FullName], 200);
        } else {
            return response()->json(['message' => 'No players found'], 404);
        }
    }

    public function getTopScorerAssociationNumber()
    {
        $topScorer = $this->getTopScorer();

        if ($topScorer) {
            return response()->json(['association_number' => $topScorer->AssociationNumber], 200);
        } else {
            return response()->json(['message' => 'No players found'], 404);
        }
    }

    public function getTopScorerPosition()
    {
        $topScorer = $this->getTopScorer();

        if ($topScorer) {
            return response()->json(['position' => $topScorer->Designation], 200);
        } else {
            return response()->json(['message' => 'No players found'], 404);
        }
    }

    private function getTopScorer()
    {
        return DB::table('Goal')
            ->select('Player.FullName', 'Player.AssociationNumber', 'Position.Designation', DB::raw('COUNT(Goal.id) as goals'))
            ->join('GamePlayer', 'Goal.PlayerID', '=', 'GamePlayer.player_id')
            ->join('Player', 'GamePlayer.player_id', '=', 'Player.id')
            ->join('Position', 'Player.PositionID', '=', 'Position.id')
            ->groupBy('Player.id', 'Player.FullName', 'Player.AssociationNumber', 'Position.Designation')
            ->orderBy('goals', 'desc')
            ->first();
    }

}
