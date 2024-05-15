<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUserEndpoint()
    {
        // Arrange
        $user = factory(\App\Models\User::class)->create();

        // Act
        $response = $this->get('/api/users/' . $user->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /**
     * Test storing an API user.
     *
     * @return void
     */
    public function testStoreApiUser()
    {
        // Generate new data for creating the user
        $userData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'secret',
        ];

        // Send a POST request to store the user
        $response = $this->post('/api/users', $userData);

        // Assert that the request was successful (status code 201)
        $response->assertStatus(201);

        // Assert that the user was stored in the database with the provided data
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
    }

    /**
     * Test updating an API user.
     *
     * @return void
     */
    public function testUpdateApiUser()
    {
        // Create a user
        $user = User::factory()->create();

        // Generate new data for updating the user
        $newData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ];

        // Send a PUT request to update the user
        $response = $this->put('/api/users/' . $user->id, $newData);

        // Assert that the request was successful (status code 200)
        $response->assertStatus(200);

        // Assert that the user was updated with the new data
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $newData['name'],
            'email' => $newData['email'],
        ]);
    }

    /**
     * Test deleting an API user.
     *
     * @return void
     */
    public function testDeleteApiUser()
    {
        // Create a user
        $user = User::factory()->create();

        // Send a DELETE request to delete the user
        $response = $this->delete('/api/users/' . $user->id);

        // Assert that the request was successful (status code 204)
        $response->assertStatus(204);

        // Assert that the user no longer exists in the database
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
