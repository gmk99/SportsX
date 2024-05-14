<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Goal as GoalModel;


class Goal extends JsonResource
{
    public static function where(string $string, mixed $id)
    {
        // Retorna uma coleção de jogadores que correspondem à condição
        return GoalModel::where($string, $id)->get();
    }

    public function toArray($request)
    {
        return [
            'goalID' => $this->goalID,
            'minute' => $this->minute,
            'goalType' => $this->goalType,
            'player' => [
                'playerID' => $this->player->playerID,
                'fullName' => $this->player->fullName,
                'birthdate' => $this->player->birthdate,
                'associationNumber' => $this->player->associationNumber,
                'position' => $this->player->position,
                'number' => $this->player->number,
            ],
        ];
    }
}
