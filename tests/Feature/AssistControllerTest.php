<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Assist;

class AssistControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/assists');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Minute' => 45,
            'GameID' => 1,
            'PlayerID' => 1,
            'GoalID' => 1
        ];

        $response = $this->post('/assists', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assists', $data);
    }

    public function testShow()
    {
        $assist = Assist::factory()->create();
        $response = $this->get('/assists/' . $assist->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $assist = Assist::factory()->create();
        $data = [
            'Minute' => 60,
        ];

        $response = $this->put('/assists/' . $assist->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('assists', $data);
    }

    public function testDestroy()
    {
        $assist = Assist::factory()->create();
        $response = $this->delete('/assists/' . $assist->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('assists', ['id' => $assist->id]);
    }
}
