<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Card;

class CardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/cards');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Minute' => 30,
            'CardTypeID' => 1,
            'GameID' => 1,
            'PlayerID' => 1
        ];

        $response = $this->post('/cards', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('cards', $data);
    }

    public function testShow()
    {
        $card = Card::factory()->create();
        $response = $this->get('/cards/' . $card->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $card = Card::factory()->create();
        $data = [
            'Minute' => 45,
        ];

        $response = $this->put('/cards/' . $card->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('cards', $data);
    }

    public function testDestroy()
    {
        $card = Card::factory()->create();
        $response = $this->delete('/cards/' . $card->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('cards', ['id' => $card->id]);
    }
}
