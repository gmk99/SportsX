<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Train;

class TrainControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/trains');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Day' => '2023-06-01',
            'StartingTime' => '2023-06-01 18:00:00',
            'EndingTime' => '2023-06-01 20:00:00',
            'TeamID' => 1,
            'FieldFieldID' => 1
        ];

        $response = $this->post('/trains', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('trains', $data);
    }

    public function testShow()
    {
        $train = Train::factory()->create();
        $response = $this->get('/trains/' . $train->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $train = Train::factory()->create();
        $data = [
            'EndingTime' => '2023-06-01 21:00:00',
        ];

        $response = $this->put('/trains/' . $train->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('trains', $data);
    }

    public function testDestroy()
    {
        $train = Train::factory()->create();
        $response = $this->delete('/trains/' . $train->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('trains', ['id' => $train->id]);
    }
}
