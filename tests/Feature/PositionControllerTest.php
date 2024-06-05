<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Position;

class PositionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/positions');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'PitchPosition' => 'Forward',
            'Designation' => 'FWD'
        ];

        $response = $this->post('/positions', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('positions', $data);
    }

    public function testShow()
    {
        $position = Position::factory()->create();
        $response = $this->get('/positions/' . $position->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $position = Position::factory()->create();
        $data = [
            'Designation' => 'DEF',
        ];

        $response = $this->put('/positions/' . $position->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('positions', $data);
    }

    public function testDestroy()
    {
        $position = Position::factory()->create();
        $response = $this->delete('/positions/' . $position->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('positions', ['id' => $position->id]);
    }
}
