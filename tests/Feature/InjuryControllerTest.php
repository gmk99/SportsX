<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Injury;

class InjuryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/injuries');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Denomination' => 'Sprained Ankle',
            'Location' => 'Ankle',
            'EstimatedTimeToRecover' => '2 weeks'
        ];

        $response = $this->post('/injuries', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('injuries', $data);
    }

    public function testShow()
    {
        $injury = Injury::factory()->create();
        $response = $this->get('/injuries/' . $injury->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $injury = Injury::factory()->create();
        $data = [
            'EstimatedTimeToRecover' => '3 weeks',
        ];

        $response = $this->put('/injuries/' . $injury->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('injuries', $data);
    }

    public function testDestroy()
    {
        $injury = Injury::factory()->create();
        $response = $this->delete('/injuries/' . $injury->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('injuries', ['id' => $injury->id]);
    }
}
