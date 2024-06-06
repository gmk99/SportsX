<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Goal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoalUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetGoalEndpoint()
    {
        // Arrange
        $goal = Goal::factory()->create();

        // Act
        $response = $this->get('/api/goals/' . $goal->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'Minute', 'GameID', 'PlayerID']);
    }

    public function testStoreGoal()
    {
        // Generate new data for creating the goal
        $goalData = [
            'Minute' => 30,
            'GameID' => 1,
            'PlayerID' => 1,
            // Add other fields as needed
        ];

        // Send a POST request to store the goal
        $response = $this->post('/api/goals', $goalData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the goal was stored in the database with the provided data
        $this->assertDatabaseHas('goals', $goalData);
    }

    public function testUpdateGoal()
    {
        // Create a goal
        $goal = Goal::factory()->create();

        // Generate new data for updating the goal
        $newData = [
            'Minute' => 45,
            'GameID' => 2,
            'PlayerID' => 2,
            // Add other fields as needed
        ];

        // Send a PUT request to update the goal
        $response = $this->put('/api/goals/' . $goal->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the goal was updated with the new data
        $this->assertDatabaseHas('goals', array_merge(['id' => $goal->id], $newData));
    }

    public function testDeleteGoal()
    {
        // Create a goal
        $goal = Goal::factory()->create();

        // Send a DELETE request to delete the goal
        $response = $this->delete('/api/goals/' . $goal->id);

        // Assert that the request was successful (status code 204)
        $response->assertStatus(204);

        // Assert that the goal no longer exists in the database
        $this->assertDatabaseMissing('goals', ['id' => $goal->id]);
    }
}
