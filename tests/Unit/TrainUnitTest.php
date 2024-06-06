<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Train;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrainUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        Train::factory()->count(3)->create();

        // Act
        $response = $this->get('/trains');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testShow()
    {
        // Arrange
        $train = Train::factory()->create();

        // Act
        $response = $this->get('/trains/' . $train->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $train->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    public function testStore()
    {
        // Arrange
        $data = [
            'Day' => 'Monday',
            'StartingTime' => '10:00',
            'EndingTime' => '12:00',
            'TeamID' => 1,
            'FieldFielID' => 1,
        ];

        // Act
        $response = $this->post('/trains', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function testUpdate()
    {
        // Arrange
        $train = Train::factory()->create();
        $updatedData = [
            'Day' => 'Tuesday',
            'StartingTime' => '09:00',
            'EndingTime' => '11:00',
            'TeamID' => 2,
            'FieldFielID' => 2,
        ];

        // Act
        $response = $this->put('/trains/' . $train->id, $updatedData);

        // Assert
        $response->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function testDestroy()
    {
        // Arrange
        $train = Train::factory()->create();

        // Act
        $response = $this->delete('/trains/' . $train->id);

        // Assert
        $response->assertStatus(200)
            ->assertJson([
                'id' => $train->id,
                // Add more assertions for other attributes if needed
            ]);
    }

    // Add more test cases as needed for other methods
}
