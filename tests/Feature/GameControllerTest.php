<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/games');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'IsAtHome' => 1,
            'OpposingTeam' => 'Opposing Team',
            'Date' => '2023-06-01',
            'StartingTime' => '2023-06-01 18:00:00',
            'GoalsScored' => 2,
            'GoalsConceded' => 1,
            'EndingTime' => '2023-06-01 20:00:00',
            'FieldFieldID' => 1,
            'TeamID' => 1
        ];

        $response = $this->post('/games', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('games', $data);
    }

    public function testShow()
    {
        $game = Game::factory()->create();
        $response = $this->get('/games/' . $game->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $game = Game::factory()->create();
        $data = [
            'GoalsScored' => 3,
        ];

        $response = $this->put('/games/' . $game->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('games', $data);
    }

    public function testDestroy()
    {
        $game = Game::factory()->create();
        $response = $this->delete('/games/' . $game->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}
