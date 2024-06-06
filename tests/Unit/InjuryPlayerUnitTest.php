<?php

namespace Tests\Unit;

use App\Http\Controllers\InjuryPlayerController;
use App\Models\InjuryPlayer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InjuryPlayerUnitTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;

    public function setUp(): void
    {
        parent::setUp();

        $this->controller = new InjuryPlayerController();
    }

    /** @test */
    public function it_returns_a_paginated_list_of_injury_players()
    {
        InjuryPlayer::factory()->count(10)->create();

        $response = $this->controller->index();

        $this->assertCount(10, $response->items());
    }

    /** @test */
    public function it_returns_a_specific_injury_player()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();

        $response = $this->controller->show($injuryPlayer->id);

        $this->assertEquals($injuryPlayer->id, $response->id);
    }

    /** @test */
    public function it_creates_a_new_injury_player()
    {
        $data = [
            'PlayerID' => 1,
            'InjuryID' => 1,
            'Date' => '2024-06-10',
            'Observation' => 'Test observation',
        ];

        $response = $this->controller->store(new Request($data));

        $this->assertDatabaseHas('injury_players', $data);
    }

    /** @test */
    public function it_updates_an_existing_injury_player()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();

        $data = [
            'PlayerID' => 2,
            'InjuryID' => 2,
            'Date' => '2024-06-11',
            'Observation' => 'Updated observation',
        ];

        $response = $this->controller->update(new Request($data), $injuryPlayer->id);

        $this->assertDatabaseHas('injury_players', $data);
    }

    /** @test */
    public function it_deletes_an_existing_injury_player()
    {
        $injuryPlayer = InjuryPlayer::factory()->create();

        $response = $this->controller->destroy($injuryPlayer->id);

        $this->assertDeleted('injury_players', ['id' => $injuryPlayer->id]);
    }

    /** @test */
    public function it_returns_the_total_number_of_injury_players()
    {
        InjuryPlayer::factory()->count(5)->create();

        $total = $this->controller->totalInjuries();

        $this->assertEquals(5, $total);
    }
}

