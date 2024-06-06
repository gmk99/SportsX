<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Coordenator;
use App\Models\User;

class CoordenatorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/coordenators');
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

        $response = $this->post('/coordenators', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('coordenators', $data);
    }

    public function testShow()
    {
        $coordenator = Coordenator::factory()->create();
        $response = $this->get('/coordenators/' . $coordenator->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $coordenator = Coordenator::factory()->create();
        $data = [
            'FullName' => 'Jane Doe',
        ];

        $response = $this->put('/coordenators/' . $coordenator->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('coordenators', $data);
    }

    public function testDestroy()
    {
        $coordenator = Coordenator::factory()->create();
        $response = $this->delete('/coordenators/' . $coordenator->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('coordenators', ['id' => $coordenator->id]);
    }
}
