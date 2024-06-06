<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterPageView()
    {
        // Arrange

        // Act
        $response = $this->get('/register');

        // Assert
        $response->assertStatus(200)
            ->assertViewIs('auth.register');
    }

    public function testUserRegistration()
    {
        // Arrange
        $userData = [
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'password123',
            'terms' => true // Assuming terms checkbox is checked
        ];

        // Act
        $response = $this->post('/register', $userData);

        // Assert
        $response->assertRedirect('/dashboard');

        // Assert user is created in the database
        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'test@example.com'
        ]);
    }
}
