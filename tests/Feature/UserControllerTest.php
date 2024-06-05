<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'username' => 'johndoe',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->post('/users', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
            'username' => 'johndoe'
        ]);
    }

    public function testShow()
    {
        $user = User::factory()->create();
        $response = $this->get('/users/' . $user->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        $data = [
            'username' => 'janedoe',
        ];

        $response = $this->put('/users/' . $user->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();
        $response = $this->delete('/users/' . $user->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
