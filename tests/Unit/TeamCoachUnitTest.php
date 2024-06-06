<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\TeamCoach;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamCoachUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        TeamCoach::factory()->count(3)->create();

        // Act
        $response = $this->get('/team-coaches');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $teamCoach = TeamCoach::factory()->create();

        // Act
        $response = $this->get('/team-coaches/' . $teamCoach->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamCoach->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'team_id' => 1,
            'coach_id' => 1,
            'CoachRoleID' => 1,
        ];

        // Act
        $response = $this->post('/team-coaches', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $teamCoach = TeamCoach::factory()->create();
        $updatedData = [
            'team_id' => 2,
            'coach_id' => 2,
            'CoachRoleID' => 2,
        ];

        // Act
        $response = $this->put('/team-coaches/' . $teamCoach->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $teamCoach = TeamCoach::factory()->create();

        // Act
        $response = $this->delete('/team-coaches/' . $teamCoach->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamCoach->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
