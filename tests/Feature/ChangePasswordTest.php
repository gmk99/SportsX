<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function testChangePassword()
    {
        $user = User::factory()->create([
            'password' => Hash::make('old_password'),
        ]);

        $this->actingAs($user);

        $data = [
            'current_password' => 'old_password',
            'new_password' => 'new_password',
            'new_password_confirmation' => 'new_password',
        ];

        $response = $this->post('/change-password', $data);
        $response->assertStatus(200);

        $user->refresh();
        $this->assertTrue(Hash::check('new_password', $user->password));
    }
}
