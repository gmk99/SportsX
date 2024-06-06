<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GameUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetGameEndpoint()
    {
        // Arrange
        $game = Game::factory()->create();

        // Act
        $response = $this->get('/api/games/' . $game->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'IsAtHome', 'OpposingTeam', 'Date', 'StartingTime', 'GoalsScored', 'GoalsConceded', 'EndingTime', 'FieldFieldID', 'TeamID']);
    }

    public function testStoreGame()
    {
        // Generate new data for creating the game
        $gameData = [
            'IsAtHome' => true,
            'OpposingTeam' => 'Opponent',
            'Date' => '2024-06-15',
            'StartingTime' => '13:00:00',
            'GoalsScored' => 2,
            'GoalsConceded' => 1,
            'EndingTime' => '15:00:00',
            'FieldFieldID' => 1,
            'TeamID' => 1,
            // Add other fields as needed
        ];

        // Send a POST request to store the game
        $response = $this->post('/api/games', $gameData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the game was stored in the database with the provided data
        $this->assertDatabaseHas('games', $gameData);
    }

    public function testUpdateGame()
    {
        // Create a game
        $game = Game::factory()->create();

        // Generate new data for updating the game
        $newData = [
            'IsAtHome' => false,
            'OpposingTeam' => 'New Opponent',
            'Date' => '2024-06-20',
            'StartingTime' => '14:00:00',
            'GoalsScored' => 3,
            'GoalsConceded' => 2,
            'EndingTime' => '16:00:00',
            'FieldFieldID' => 2,
            'TeamID' => 2,
            // Add other fields as needed
        ];

        // Send a PUT request to update the game
        $response = $this->put('/api/games/' . $game->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the game was updated with the new data
        $this->assertDatabaseHas('games', array_merge(['id' => $game->id], $newData));
    }

    public function testDeleteGame()
    {
        // Create a game
        $game = Game::factory()->create();

        // Send a DELETE request to delete the game
        $response = $this->delete('/api/games/' . $game->id);

        // Assert that the request was successful (status code 204)
        $response->assertStatus(204);

        // Assert that the game no longer exists in the database
        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}
