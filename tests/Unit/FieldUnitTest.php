<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Field;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FieldUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Creating test fields
        Field::factory()->count(5)->create();

        // Making GET request to index endpoint
        $response = $this->get('/api/fields');

        // Asserting response status
        $response->assertStatus(200)
            ->assertJsonCount(5); // Asserting that there are 5 fields in the response
    }

    public function testShow()
    {
        // Creating a test field
        $field = Field::factory()->create();

        // Making GET request to show endpoint
        $response = $this->get('/api/fields/' . $field->id);

        // Asserting response status
        $response->assertStatus(200)
            ->assertJson([
                'id' => $field->id,
                'FieldType' => $field->FieldType,
                'Denomination' => $field->Denomination,
                // Assert other attributes as needed
            ]);
    }

    public function testStore()
    {
        // Simulating request data
        $data = [
            'FieldType' => 'Type',
            'Denomination' => 'Field Name',
            // Add other attributes as needed
        ];

        // Making POST request to store endpoint with the simulated data
        $response = $this->post('/api/fields', $data);

        // Asserting response status
        $response->assertStatus(201)
            ->assertJson($data); // Asserting that the response matches the sent data

        // Asserting that the field was actually created in the database
        $this->assertDatabaseHas('fields', $data);
    }

    public function testUpdate()
    {
        // Creating a test field
        $field = Field::factory()->create();

        // Simulating updated data
        $updatedData = [
            'FieldType' => 'Updated Type',
            'Denomination' => 'Updated Field Name',
            // Update other attributes as needed
        ];

        // Making PUT request to update endpoint with the simulated updated data
        $response = $this->put('/api/fields/' . $field->id, $updatedData);

        // Asserting response status
        $response->assertStatus(200)
            ->assertJson($updatedData); // Asserting that the response matches the updated data

        // Asserting that the field was actually updated in the database
        $this->assertDatabaseHas('fields', $updatedData);
    }

    public function testDestroy()
    {
        // Creating a test field
        $field = Field::factory()->create();

        // Making DELETE request to destroy endpoint
        $response = $this->delete('/api/fields/' . $field->id);

        // Asserting response status
        $response->assertStatus(200)
            ->assertJson([
                'id' => $field->id,
                'FieldType' => $field->FieldType,
                'Denomination' => $field->Denomination,
                // Assert other attributes as needed
            ]); // Asserting that the response matches the deleted field

        // Asserting that the field was actually deleted from the database
        $this->assertDatabaseMissing('fields', ['id' => $field->id]);
    }
}
