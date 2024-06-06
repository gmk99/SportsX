<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        Team::factory()->count(3)->create();

        // Act
        $response = $this->get('/teams');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $team = Team::factory()->create();

        // Act
        $response = $this->get('/teams/' . $team->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $team->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'Name' => 'Test Team',
            'LevelID' => 1,
            'TeamDirectorID' => 1,
        ];

        // Act
        $response = $this->post('/teams', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $team = Team::factory()->create();
        $updatedData = [
            'Name' => 'Updated Team Name',
            'LevelID' => 2,
            'TeamDirectorID' => 2,
        ];

        // Act
        $response = $this->put('/teams/' . $team->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $team = Team::factory()->create();

        // Act
        $response = $this->delete('/teams/' . $team->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $team->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
