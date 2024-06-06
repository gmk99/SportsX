<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Player;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/players');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'FullName' => 'John Doe',
            'Birthdate' => '2000-01-01',
            'AssociationNumber' => 123456,
            'PhoneNumber' => 123456789,
            'PositionID' => 1
        ];

        $response = $this->post('/players', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('players', $data);
    }

    public function testShow()
    {
        $player = Player::factory()->create();
        $response = $this->get('/players/' . $player->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $player = Player::factory()->create();
        $data = [
            'FullName' => 'Jane Doe',
        ];

        $response = $this->put('/players/' . $player->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('players', $data);
    }

    public function testDestroy()
    {
        $player = Player::factory()->create();
        $response = $this->delete('/players/' . $player->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('players', ['id' => $player->id]);
    }
}
