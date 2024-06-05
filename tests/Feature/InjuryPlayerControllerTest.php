<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\InjuryPlayer;

class InjuryPlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/injury-players');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Date' => '2023-06-01',
            'Observation' => 'Player fell during practice',
            'InjuryID' => 1,
            'PlayerID' => 1
        ];

        $response = $this->post('/injury-players', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('injury_players', $data);
    }

    public function testShow()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();
        $response = $this->get('/injury-players/' . $injuryPlayer->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();
        $data = [
            'Observation' => 'Player recovered faster than expected',
        ];

        $response = $this->put('/injury-players/' . $injuryPlayer->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('injury_players', $data);
    }

    public function testDestroy()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();
        $response = $this->delete('/injury-players/' . $injuryPlayer->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('injury_players', ['id' => $injuryPlayer->id]);
    }
}
