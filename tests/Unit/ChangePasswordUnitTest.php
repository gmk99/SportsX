<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\ChangePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class ChangePasswordUnitTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testUpdatePassword()
    {
        $newPassword = 'newpassword123';

        $request = new Request([
            'email' => $this->user->email,
            'password' => $newPassword,
            'confirm-password' => $newPassword,
        ]);

        $controller = new ChangePassword();
        $response = $controller->update($request);

        $response->assertRedirect('login');

        $this->assertTrue(
            User::where('email', $this->user->email)
                ->where('password', bcrypt($newPassword))
                ->exists()
        );
    }

    public function testUpdatePasswordInvalidEmail()
    {
        $newPassword = 'newpassword123';

        $request = new Request([
            'email' => 'nonexistent@example.com',
            'password' => $newPassword,
            'confirm-password' => $newPassword,
        ]);

        $controller = new ChangePassword();
        $response = $controller->update($request);

        $response->assertRedirect(route('auth.change-password.show'));
        $response->assertSessionHasErrors('email');

        $this->assertFalse(
            User::where('email', 'nonexistent@example.com')
                ->where('password', bcrypt($newPassword))
                ->exists()
        );
    }

    public function testUpdatePasswordMismatchedConfirmation()
    {
        $newPassword = 'newpassword123';

        $request = new Request([
            'email' => $this->user->email,
            'password' => $newPassword,
            'confirm-password' => 'differentpassword',
        ]);

        $controller = new ChangePassword();
        $response = $controller->update($request);

        $response->assertRedirect(route('auth.change-password.show'));
        $response->assertSessionHasErrors('confirm-password');

        $this->assertFalse(
            User::where('email', $this->user->email)
                ->where('password', bcrypt($newPassword))
                ->exists()
        );
    }
}
