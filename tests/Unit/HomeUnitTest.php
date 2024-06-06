<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoalController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200)
            ->assertViewIs('pages.dashboard');
    }

    public function testTotalGoals()
    {
        // Arrange
        $homeController = new HomeController();
        $goalController = new GoalController();

        // Mock the bestScorer method in the GoalController
        $mockedBestScorerData = [
            'Fullname' => 'John Doe',
            'total_goals' => 10,
        ];
        $this->mock(GoalController::class, function ($mock) use ($mockedBestScorerData) {
            $mock->shouldReceive('bestScorer')->andReturn($mockedBestScorerData);
        });

        // Act
        $response = $homeController->totalGoals();

        // Assert
        $this->assertEquals(
            "O melhor marcador é {$mockedBestScorerData['Fullname']} com {$mockedBestScorerData['total_goals']} golos.",
            $response
        );
    }
}
