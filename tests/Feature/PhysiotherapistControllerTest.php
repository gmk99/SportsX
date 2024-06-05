<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Physiotherapist;
use App\Models\User;

class PhysiotherapistControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/physiotherapists');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $data = [
            'FullName' => 'John Doe',
            'Birthdate' => '1980-01-01',
            'UsersID' => $user->id
        ];

        $response = $this->post('/physiotherapists', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('physiotherapists', $data);
    }

    public function testShow()
    {
        $physiotherapist = Physiotherapist::factory()->create();
        $response = $this->get('/physiotherapists/' . $physiotherapist->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $physiotherapist = Physiotherapist::factory()->create();
        $data = [
            'FullName' => 'Jane Doe',
        ];

        $response = $this->put('/physiotherapists/' . $physiotherapist->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('physiotherapists', $data);
    }

    public function testDestroy()
    {
        $physiotherapist = Physiotherapist::factory()->create();
        $response = $this->delete('/physiotherapists/' . $physiotherapist->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('physiotherapists', ['id' => $physiotherapist->id]);
    }
}
