<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Level;

class LevelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/levels');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Designation' => 'U18',
            'MaximumAge' => 18,
            'CoordenatorID' => 1
        ];

        $response = $this->post('/levels', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('levels', $data);
    }

    public function testShow()
    {
        $level = Level::factory()->create();
        $response = $this->get('/levels/' . $level->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $level = Level::factory()->create();
        $data = [
            'MaximumAge' => 19,
        ];

        $response = $this->put('/levels/' . $level->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('levels', $data);
    }

    public function testDestroy()
    {
        $level = Level::factory()->create();
        $response = $this->delete('/levels/' . $level->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('levels', ['id' => $level->id]);
    }
}
