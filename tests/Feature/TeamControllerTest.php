<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Team;

class TeamControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/teams');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Name' => 'Team A',
            'LevelID' => 1,
            'TeamDirectorID' => 1
        ];

        $response = $this->post('/teams', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('teams', $data);
    }

    public function testShow()
    {
        $team = Team::factory()->create();
        $response = $this->get('/teams/' . $team->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $team = Team::factory()->create();
        $data = [
            'Name' => 'Team B',
        ];

        $response = $this->put('/teams/' . $team->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('teams', $data);
    }

    public function testDestroy()
    {
        $team = Team::factory()->create();
        $response = $this->delete('/teams/' . $team->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
    }
}
