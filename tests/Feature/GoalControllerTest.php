<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Goal;

class GoalControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/goals');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Minute' => 30,
            'GameID' => 1,
            'PlayerID' => 1
        ];

        $response = $this->post('/goals', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('goals', $data);
    }

    public function testShow()
    {
        $goal = Goal::factory()->create();
        $response = $this->get('/goals/' . $goal->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $goal = Goal::factory()->create();
        $data = [
            'Minute' => 45,
        ];

        $response = $this->put('/goals/' . $goal->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('goals', $data);
    }

    public function testDestroy()
    {
        $goal = Goal::factory()->create();
        $response = $this->delete('/goals/' . $goal->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('goals', ['id' => $goal->id]);
    }
}
