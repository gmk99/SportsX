<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\TeamPlayer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamPlayerUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        TeamPlayer::factory()->count(3)->create();

        // Act
        $response = $this->get('/team-players');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $teamPlayer = TeamPlayer::factory()->create();

        // Act
        $response = $this->get('/team-players/' . $teamPlayer->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamPlayer->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'team_id' => 1,
            'player_id' => 1,
            'Number' => '10',
        ];

        // Act
        $response = $this->post('/team-players', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $teamPlayer = TeamPlayer::factory()->create();
        $updatedData = [
            'team_id' => 2,
            'player_id' => 2,
            'Number' => '11',
        ];

        // Act
        $response = $this->put('/team-players/' . $teamPlayer->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $teamPlayer = TeamPlayer::factory()->create();

        // Act
        $response = $this->delete('/team-players/' . $teamPlayer->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $teamPlayer->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
