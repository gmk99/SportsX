<?php

namespace Tests\Unit;

use App\Http\Controllers\LevelController;
use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LevelUnitTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;

    public function setUp(): void
    {
        parent::setUp();

        $this->controller = new LevelController();
    }

    /** @test */
    public function it_returns_a_paginated_list_of_levels()
    {
        Level::factory()->count(10)->create();

        $response = $this->controller->index();

        $this->assertCount(10, $response->items());
    }

    /** @test */
    public function it_returns_a_specific_level()
    {
        $level = Level::factory()->create();

        $response = $this->controller->show($level->id);

        $this->assertEquals($level->id, $response->id);
    }

    /** @test */
    public function it_creates_a_new_level()
    {
        $data = [
            'Designation' => 'Test Level',
            'MaximumAge' => 18,
            'CoordenatorID' => 1,
        ];

        $response = $this->controller->store(new Request($data));

        $this->assertDatabaseHas('levels', $data);
    }

    /** @test */
    public function it_updates_an_existing_level()
    {
        $level = Level::factory()->create();

        $data = [
            'Designation' => 'Updated Level',
            'MaximumAge' => 20,
            'CoordenatorID' => 2,
        ];

        $response = $this->controller->update(new Request($data), $level->LevelID);

        $this->assertDatabaseHas('levels', $data);
    }

    /** @test */
    public function it_deletes_an_existing_level()
    {
        $level = Level::factory()->create();

        $response = $this->controller->destroy($level->id);

        $this->assertDeleted('levels', ['id' => $level->id]);
    }
}

