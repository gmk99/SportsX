<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TeamPlayer;

class TeamPlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/team-players');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'team_id' => 1,
            'player_id' => 1,
            'Number' => 10
        ];

        $response = $this->post('/team-players', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('team_players', $data);
    }

    public function testShow()
    {
        $teamPlayer = TeamPlayer::factory()->create();
        $response = $this->get('/team-players/' . $teamPlayer->team_id . '/' . $teamPlayer->player_id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $teamPlayer = TeamPlayer::factory()->create();
        $data = [
            'Number' => 11,
        ];

        $response = $this->put('/team-players/' . $teamPlayer->team_id . '/' . $teamPlayer->player_id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('team_players', $data);
    }

    public function testDestroy()
    {
        $teamPlayer = TeamPlayer::factory()->create();
        $response = $this->delete('/team-players/' . $teamPlayer->team_id . '/' . $teamPlayer->player_id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('team_players', ['team_id' => $teamPlayer->team_id, 'player_id' => $teamPlayer->player_id]);
    }
}
