<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\GamePlayer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GamePlayerUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetGamePlayerEndpoint()
    {
        // Arrange
        $gamePlayer = GamePlayer::factory()->create();

        // Act
        $response = $this->get('/api/game-players/' . $gamePlayer->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'game_id', 'player_id', 'IsStarter', 'Minutes']);
    }

    public function testStoreGamePlayer()
    {
        // Generate new data for creating the game player
        $gamePlayerData = [
            'game_id' => 1,
            'player_id' => 1,
            'IsStarter' => true,
            'Minutes' => 90,
            // Add other fields as needed
        ];

        // Send a POST request to store the game player
        $response = $this->post('/api/game-players', $gamePlayerData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the game player was stored in the database with the provided data
        $this->assertDatabaseHas('game_players', $gamePlayerData);
    }

    public function testUpdateGamePlayer()
    {
        // Create a game player
        $gamePlayer = GamePlayer::factory()->create();

        // Generate new data for updating the game player
        $newData = [
            'game_id' => 2,
            'player_id' => 2,
            'IsStarter' => false,
            'Minutes' => 60,
            // Add other fields as needed
        ];

        // Send a PUT request to update the game player
        $response = $this->put('/api/game-players/' . $gamePlayer->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the game player was updated with the new data
        $this->assertDatabaseHas('game_players', array_merge(['id' => $gamePlayer->id], $newData));
    }

    public function testDeleteGamePlayer()
    {
        // Create a game player
        $gamePlayer = GamePlayer::factory()->create();

        // Send a DELETE request to delete the game player
        $response = $this->delete('/api/game-players/' . $gamePlayer->id);

        // Assert that the request was successful (status code 204)
        $response->assertStatus(204);

        // Assert that the game player no longer exists in the database
        $this->assertDatabaseMissing('game_players', ['id' => $gamePlayer->id]);
    }
}

