<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TeamCoach;

class TeamCoachControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/team-coaches');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'team_id' => 1,
            'coach_id' => 1,
            'CoachRoleID' => 1
        ];

        $response = $this->post('/team-coaches', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('team_coaches', $data);
    }

    public function testShow()
    {
        $teamCoach = TeamCoach::factory()->create();
        $response = $this->get('/team-coaches/' . $teamCoach->team_id . '/' . $teamCoach->coach_id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $teamCoach = TeamCoach::factory()->create();
        $data = [
            'CoachRoleID' => 2,
        ];

        $response = $this->put('/team-coaches/' . $teamCoach->team_id . '/' . $teamCoach->coach_id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('team_coaches', $data);
    }

    public function testDestroy()
    {
        $teamCoach = TeamCoach::factory()->create();
        $response = $this->delete('/team-coaches/' . $teamCoach->team_id . '/' . $teamCoach->coach_id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('team_coaches', ['team_id' => $teamCoach->team_id, 'coach_id' => $teamCoach->coach_id]);
    }
}
