<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\CardType;

class CardTypeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/card-types');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Denomination' => 'Yellow Card',
        ];

        $response = $this->post('/card-types', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('card_types', $data);
    }

    public function testShow()
    {
        $cardType = CardType::factory()->create();
        $response = $this->get('/card-types/' . $cardType->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $cardType = CardType::factory()->create();
        $data = [
            'Denomination' => 'Red Card',
        ];

        $response = $this->put('/card-types/' . $cardType->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('card_types', $data);
    }

    public function testDestroy()
    {
        $cardType = CardType::factory()->create();
        $response = $this->delete('/card-types/' . $cardType->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('card_types', ['id' => $cardType->id]);
    }
}
