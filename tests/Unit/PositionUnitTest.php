<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PositionUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        Position::factory()->count(3)->create();

        // Act
        $response = $this->get('/positions');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $position = Position::factory()->create();

        // Act
        $response = $this->get('/positions/' . $position->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $position->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'PitchPosition' => 'Forward',
            'Designation' => 'Striker',
        ];

        // Act
        $response = $this->post('/positions', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $position = Position::factory()->create();
        $updatedData = [
            'PitchPosition' => 'Midfield',
            'Designation' => 'Midfielder',
        ];

        // Act
        $response = $this->put('/positions/' . $position->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $position = Position::factory()->create();

        // Act
        $response = $this->delete('/positions/' . $position->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $position->id,
                // Add more assertions for other attributes if needed
            ]);
    }
}
