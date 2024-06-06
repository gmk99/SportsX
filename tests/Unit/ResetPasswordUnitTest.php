<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testShowResetPasswordView()
    {
        // Arrange

        // Act
        $response = $this->get('/reset-password');

        // Assert
        $response->assertStatus(200)
            ->assertViewIs('auth.reset-password');
    }

    public function testSendResetPasswordLink()
    {
        // Arrange
        $user = User::factory()->create();
        $requestData = ['email' => $user->email];

        // Mock the notification to prevent sending actual emails
        Notification::fake();

        // Act
        $response = $this->post('/reset-password/send', $requestData);

        // Assert
        $response->assertRedirect();
        $response->assertSessionHas('success', 'An email was sent to your email address');

        // Assert that the user was notified via email
        Notification::assertSentTo(
            $user,
            \App\Notifications\ForgotPassword::class
        );
    }
}
