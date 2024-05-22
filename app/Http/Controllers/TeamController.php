<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Http\Resources\Team as TeamResource;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(){
        $teams = Team::paginate(15);
        return TeamResource::collection($teams);
    }

    public function show($id){
        $team = Team::findOrFail( $id );
        return new TeamResource( $team );
    }

    public function store(Request $request){
        $team = new Team;
        $team->Name = $request->input('Name');
        $team->LevelID = $request->input('LevelID');
        $team->TeamDirectorID = $request->input('TeamDirectorID');

        if( $team->save() ){
            return new TeamResource( $team );
        }
    }

    public function update(Request $request)
    {
        $team = Team::findOrFail( $request->id );
        $team->Name = $request->input('Name');
        $team->LevelID = $request->input('LevelID');
        $team->TeamDirectorID = $request->input('TeamDirectorID');

        if( $team->save() )
        {
            return new TeamResource($team);
        }
    }

    public function destroy($id)
    {
        $team = Team::findOrFail( $id );
        if( $team->delete() )
        {
            return new TeamResource( $team );
        }
    }

    public function totalTeams()
    {
        $total = Team::count();
        return $total;
    }

    public function teamManagementData()
    {
        // Seleciona apenas as colunas necessárias da tabela Team
        $teams = Team::select('id', 'Name', 'LevelID')->get();

        // Verifica se não há equipes
        if ($teams->isEmpty()) {
            return response()->json(['message' => 'Nenhuma equipa encontrada'], 404);
        }

        // Array para armazenar detalhes das equipes
        $teamsDetails = [];

        // Itera sobre cada equipe para adicionar detalhes
        foreach ($teams as $team) {
            // Obtém o nível da equipe
            $level = $team->level;

            // Adiciona detalhes da equipe ao array
            $teamsDetails[] = [
                'Id' => $team->id,
                'Name' => $team->Name,
                'LevelID' => $team->LevelID,
                'LevelName' => $level ? $level->Designation : 'N/A',
            ];
        }

        // Retorna os detalhes das equipes como resposta JSON
        return response()->json($teamsDetails);
    }
}
