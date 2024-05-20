<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\DB;


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

    public function topScorer()
    {
        $topScorer = $this->getTopScorer();

        if ($topScorer) {
            return response()->json([
                'Name' => $topScorer->FullName,
                'Number' => $topScorer->Number,
                'Position' => $topScorer->Designation,
                'Goals' => $topScorer->goals,
            ]);
        } else {
            return response()->json(['message' => 'Nenhum jogador encontrado'], 404);
        }
    }

    private function getTopScorer()
    {
        return DB::table('Goal')
            ->select(
                'Player.FullName',
                'GamePlayer.player_id',
                'Position.Designation',
                'TeamPlayer.Number',
                DB::raw('COUNT(Goal.id) as goals')
            )
            ->join('GamePlayer', 'Goal.PlayerID', '=', 'GamePlayer.player_id')
            ->join('Player', 'GamePlayer.player_id', '=', 'Player.id')
            ->join('Position', 'Player.PositionID', '=', 'Position.id')
            ->join('TeamPlayer', 'Player.id', '=', 'TeamPlayer.player_id')
            ->groupBy('Player.id', 'Player.FullName', 'GamePlayer.player_id', 'Position.Designation', 'TeamPlayer.Number')
            ->orderBy('goals', 'desc')
            ->first();
    }



}
