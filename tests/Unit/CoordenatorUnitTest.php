<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Coordenator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoordenatorUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCoordenatorEndpoint()
    {
        // Arrange
        $coordenator = Coordenator::factory()->create();

        // Act
        $response = $this->get('/api/coordenators/' . $coordenator->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'FullName', 'Birthdate', 'UsersID']);
    }

    public function testStoreCoordenator()
    {
        // Generate new data for creating the coordenator
        $coordenatorData = [
            'FullName' => 'John Doe',
            'Birthdate' => '1990-01-01',
            'UsersID' => 1,
            // Add other fields as needed
        ];

        // Send a POST request to store the coordenator
        $response = $this->post('/api/coordenators', $coordenatorData);

        // Assert that the request was successful (status code 201)
        $response->assertStatus(201);

        // Assert that the coordenator was stored in the database with the provided data
        $this->assertDatabaseHas('coordenators', $coordenatorData);
    }

    public function testUpdateCoordenator()
    {
        // Create a coordenator
        $coordenator = Coordenator::factory()->create();

        // Generate new data for updating the coordenator
        $newData = [
            'FullName' => 'Jane Doe',
            'Birthdate' => '1995-01-01',
            'UsersID' => 2,
            // Add other fields as needed
        ];

        // Send a PUT request to update the coordenator
        $response = $this->put('/api/coordenators/' . $coordenator->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the coordenator was updated with the new data
        $this->assertDatabaseHas('coordenators', array_merge(['id' => $coordenator->id], $newData));
    }

    public function testDeleteCoordenator()
    {
        // Create a coordenator
        $coordenator = Coordenator::factory()->create();

        // Send a DELETE request to delete the coordenator
        $response = $this->delete('/api/coordenators/' . $coordenator->id);

        // Assert that the request was successful (status code 204)
        $response->assertStatus(204);

        // Assert that the coordenator no longer exists in the database
        $this->assertDatabaseMissing('coordenators', ['id' => $coordenator->id]);
    }
}
