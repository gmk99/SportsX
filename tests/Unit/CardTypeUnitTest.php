<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CardType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CardTypeUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCardTypeEndpoint()
    {
        $cardType = CardType::factory()->create();
        $response = $this->get('/api/card-types/' . $cardType->id);
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'Denomination']);
    }

    public function testStoreCardType()
    {
        $cardTypeData = ['Denomination' => 'Test Denomination'];
        $response = $this->post('/api/card-type', $cardTypeData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('card_types', $cardTypeData);
    }

    public function testUpdateCardType()
    {
        $cardType = CardType::factory()->create();
        $newData = ['Denomination' => 'Updated Denomination'];
        $response = $this->put('/api/card-type/' . $cardType->id, $newData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('card_types', array_merge(['id' => $cardType->id], $newData));
    }

    public function testDeleteCardType()
    {
        $cardType = CardType::factory()->create();
        $response = $this->delete('/api/card-type/' . $cardType->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('card_types', ['id' => $cardType->id]);
    }
}
