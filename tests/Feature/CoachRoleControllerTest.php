<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\CoachRole;

class CoachRoleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/coach-roles');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Denomination' => 'Head Coach',
        ];

        $response = $this->post('/coach-roles', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('coach_roles', $data);
    }

    public function testShow()
    {
        $coachRole = CoachRole::factory()->create();
        $response = $this->get('/coach-roles/' . $coachRole->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $coachRole = CoachRole::factory()->create();
        $data = [
            'Denomination' => 'Assistant Coach',
        ];

        $response = $this->put('/coach-roles/' . $coachRole->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('coach_roles', $data);
    }

    public function testDestroy()
    {
        $coachRole = CoachRole::factory()->create();
        $response = $this->delete('/coach-roles/' . $coachRole->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('coach_roles', ['id' => $coachRole->id]);
    }
}
