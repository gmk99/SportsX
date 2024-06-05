<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testResetPassword()
    {
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => Hash::make('oldpassword')
        ]);

        $data = [
            'email' => 'johndoe@example.com',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
            'token' => 'resettoken' // Assuming you are using a token mechanism
        ];

        $response = $this->post('/password/reset', $data);
        $response->assertStatus(200);

        $user->refresh();
        $this->assertTrue(Hash::check('newpassword123', $user->password));
    }
}
