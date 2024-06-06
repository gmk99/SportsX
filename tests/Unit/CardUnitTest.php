<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCardEndpoint()
    {
        $card = Card::factory()->create();
        $response = $this->get('/api/cards/' . $card->id);
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'Minute', 'CardTypelD', 'GameID', 'PlayerID']);
    }

    public function testStoreCard()
    {
        $cardData = [
            'Minute' => 10,
            'CardTypelD' => 1,
            'GameID' => 1,
            'PlayerID' => 1,
        ];
        $response = $this->post('/api/card', $cardData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('cards', $cardData);
    }

    public function testUpdateCard()
    {
        $card = Card::factory()->create();
        $newData = [
            'Minute' => 20,
            'CardTypelD' => 2,
            'GameID' => 2,
            'PlayerID' => 2,
        ];
        $response = $this->put('/api/card/' . $card->id, $newData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('cards', array_merge(['id' => $card->id], $newData));
    }

    public function testDeleteCard()
    {
        $card = Card::factory()->create();
        $response = $this->delete('/api/card/' . $card->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('cards', ['id' => $card->id]);
    }
}
