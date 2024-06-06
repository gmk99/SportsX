<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Player;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        Player::factory()->count(3)->create();

        // Act
        $response = $this->get('/players');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $player = Player::factory()->create();

        // Act
        $response = $this->get('/players/' . $player->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $player->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $position = Position::factory()->create();
        $data = [
            'FullName' => 'John Doe',
            'Birthdate' => '1990-01-01',
            'AssociationNumber' => '123456',
            'PhoneNumber' => '123456789',
            'PositionID' => $position->id,
        ];

        // Act
        $response = $this->post('/players', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $player = Player::factory()->create();
        $updatedData = [
            'FullName' => 'Jane Doe',
            'Birthdate' => '1995-01-01',
            'AssociationNumber' => '654321',
            'PhoneNumber' => '987654321',
            'PositionID' => $player->PositionID,
        ];

        // Act
        $response = $this->put('/players/' . $player->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $player = Player::factory()->create();

        // Act
        $response = $this->delete('/players/' . $player->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $player->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
