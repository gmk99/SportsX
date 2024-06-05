<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowProfile()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/user-profile/' . $user->id);
        $response->assertStatus(200);
    }

    public function testUpdateProfile()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = [
            'firstname' => 'Jane',
            'lastname' => 'Doe',
        ];

        $response = $this->put('/user-profile/' . $user->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
    }
}
