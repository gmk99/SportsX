<?php

namespace Tests\Unit;

use App\Http\Controllers\InjuryPlayerTreatmentController;
use App\Models\InjuryPlayerTreatment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InjuryPlayerTreatmentUnitTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;

    public function setUp(): void
    {
        parent::setUp();

        $this->controller = new InjuryPlayerTreatmentController();
    }

    /** @test */
    public function it_returns_a_paginated_list_of_injury_player_treatments()
    {
        InjuryPlayerTreatment::factory()->count(10)->create();

        $response = $this->controller->index();

        $this->assertCount(10, $response->items());
    }

    /** @test */
    public function it_returns_a_specific_injury_player_treatment()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();

        $response = $this->controller->show($injuryPlayerTreatment->id);

        $this->assertEquals($injuryPlayerTreatment->id, $response->id);
    }

    /** @test */
    public function it_creates_a_new_injury_player_treatment()
    {
        $data = [
            'InjuryPlayerID' => 1,
            'Notes' => 'Test notes',
            'PhysiotherapistID' => 1,
        ];

        $response = $this->controller->store(new Request($data));

        $this->assertDatabaseHas('injury_player_treatments', $data);
    }

    /** @test */
    public function it_updates_an_existing_injury_player_treatment()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();

        $data = [
            'InjuryPlayerID' => 2,
            'Notes' => 'Updated notes',
            'PhysiotherapistID' => 2,
        ];

        $response = $this->controller->update(new Request($data), $injuryPlayerTreatment->id);

        $this->assertDatabaseHas('injury_player_treatments', $data);
    }

    /** @test */
    public function it_deletes_an_existing_injury_player_treatment()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();

        $response = $this->controller->destroy($injuryPlayerTreatment->id);

        $this->assertDeleted('injury_player_treatments', ['id' => $injuryPlayerTreatment->id]);
    }
}

