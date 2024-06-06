<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TeamDirector;
use App\Models\User;

class TeamDirectorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/team-directors');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $data = [
            'FullName' => 'John Doe',
            'Birthdate' => '1980-01-01',
            'UsersID' => $user->id
        ];

        $response = $this->post('/team-directors', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('team_directors', $data);
    }

    public function testShow()
    {
        $teamDirector = TeamDirector::factory()->create();
        $response = $this->get('/team-directors/' . $teamDirector->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $teamDirector = TeamDirector::factory()->create();
        $data = [
            'FullName' => 'Jane Doe',
        ];

        $response = $this->put('/team-directors/' . $teamDirector->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('team_directors', $data);
    }

    public function testDestroy()
    {
        $teamDirector = TeamDirector::factory()->create();
        $response = $this->delete('/team-directors/' . $teamDirector->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('team_directors', ['id' => $teamDirector->id]);
    }
}
