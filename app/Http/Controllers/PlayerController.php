<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Position;
use App\Models\InjuryPlayer;
use Carbon\Carbon;


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
        $topScorer = $this->getScorer(1);

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
    public function secondTopScorer()
    {
        $topScorer = $this->getScorer(2);

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
    public function thirdTopScorer()
    {
        $topScorer = $this->getScorer(3);

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

    public function forthTopScorer()
    {
        $topScorer = $this->getScorer(4);

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

    public function fifthTopScorer()
    {
        $topScorer = $this->getScorer(5);

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

    public function playerManagementData()
    {
        $players = Player::with(['team.level', 'position', 'teamPlayer', 'injuryPlayer'])->get();

        if ($players->isEmpty()) {
            return response()->json(['message' => 'Nenhum jogador encontrado'], 404);
        }

        $playersDetails = [];

        foreach ($players as $player) {
            $team = $player->team;
            $position = $player->position;
            $teamPlayer = $player->teamPlayer;
            $injuryStatus = $player->injuryPlayer ? 'Lesionado' : 'Apto';
            $age = Carbon::parse($player->Birthdate)->age;

            $playersDetails[] = [
                'Name' => $player->FullName,
                'Number' => $teamPlayer ? $teamPlayer->Number : 'N/A',
                'Position' => $position ? $position->Designation : 'N/A',
                'TeamName' => $team ? $team->Name : 'N/A',
                'Level' => $team && $team->level ? $team->level->Designation : 'N/A',
                'InjuryStatus' => $injuryStatus,
                'Age' => $age,
            ];
        }

        return response()->json($playersDetails);
    }


    private function getScorer($x)
    {
        $x=$x-1;
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
            ->skip($x)
            ->first();
    }



}
