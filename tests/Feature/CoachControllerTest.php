<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Coach;
use App\Models\User;

class CoachControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/coaches');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $data = [
            'FullName' => 'John Doe',
            'Birthdate' => '1980-01-01',
            'Degree' => 'Advanced',
            'AssociationNumber' => 12345,
            'UsersID' => $user->id
        ];

        $response = $this->post('/coaches', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('coaches', $data);
    }

    public function testShow()
    {
        $coach = Coach::factory()->create();
        $response = $this->get('/coaches/' . $coach->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $coach = Coach::factory()->create();
        $data = [
            'FullName' => 'Jane Doe',
        ];

        $response = $this->put('/coaches/' . $coach->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('coaches', $data);
    }

    public function testDestroy()
    {
        $coach = Coach::factory()->create();
        $response = $this->delete('/coaches/' . $coach->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('coaches', ['id' => $coach->id]);
    }
}

