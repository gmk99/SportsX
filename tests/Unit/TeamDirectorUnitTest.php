<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\TeamDirector;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamDirectorUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        TeamDirector::factory()->count(3)->create();

        // Act
        $response = $this->get('/team-directors');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $teamDirector = TeamDirector::factory()->create();

        // Act
        $response = $this->get('/team-directors/' . $teamDirector->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamDirector->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'FullName' => 'Test Team Director',
            'Birthdate' => '1990-01-01',
            'UsersID' => 1,
        ];

        // Act
        $response = $this->post('/team-directors', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $teamDirector = TeamDirector::factory()->create();
        $updatedData = [
            'FullName' => 'Updated Team Director Name',
            'Birthdate' => '1991-01-01',
            'UsersID' => 2,
        ];

        // Act
        $response = $this->put('/team-directors/' . $teamDirector->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $teamDirector = TeamDirector::factory()->create();

        // Act
        $response = $this->delete('/team-directors/' . $teamDirector->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamDirector->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
