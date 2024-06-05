<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\GamePlayer;

class GamePlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/game-players');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'game_id' => 1,
            'player_id' => 1,
            'IsStarter' => 1,
            'Minutes' => 90
        ];

        $response = $this->post('/game-players', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('game_players', $data);
    }

    public function testShow()
    {
        $gamePlayer = GamePlayer::factory()->create();
        $response = $this->get('/game-players/' . $gamePlayer->game_id . '/' . $gamePlayer->player_id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $gamePlayer = GamePlayer::factory()->create();
        $data = [
            'Minutes' => 75,
        ];

        $response = $this->put('/game-players/' . $gamePlayer->game_id . '/' . $gamePlayer->player_id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('game_players', $data);
    }

    public function testDestroy()
    {
        $gamePlayer = GamePlayer::factory()->create();
        $response = $this->delete('/game-players/' . $gamePlayer->game_id . '/' . $gamePlayer->player_id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('game_players', ['game_id' => $gamePlayer->game_id, 'player_id' => $gamePlayer->player_id]);
    }
}
