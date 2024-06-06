<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Assist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssistUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAssistEndpoint()
    {
        $assist = Assist::factory()->create();
        $response = $this->get('/api/assists/' . $assist->id);
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'Minute', 'GameID', 'PlayerID', 'GoalID']);
    }

    public function testStoreAssist()
    {
        $assistData = [
            'Minute' => 10,
            'GameID' => 1,
            'PlayerID' => 1,
            'GoalID' => 1,
        ];
        $response = $this->post('/api/assist', $assistData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('assists', $assistData);
    }

    public function testUpdateAssist()
    {
        $assist = Assist::factory()->create();
        $newData = [
            'Minute' => 20,
            'GameID' => 2,
            'PlayerID' => 2,
            'GoalID' => 2,
        ];
        $response = $this->put('/api/assist/' . $assist->id, $newData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('assists', array_merge(['id' => $assist->id], $newData));
    }

    public function testDeleteAssist()
    {
        $assist = Assist::factory()->create();
        $response = $this->delete('/api/assist/' . $assist->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('assists', ['id' => $assist->id]);
    }
}
