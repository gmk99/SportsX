<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CoachRole;
use App\Http\Controllers\CoachRoleController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class CoachRoleUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/api/coach-roles');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [['id', 'Denomination']]]);
    }

    public function testShow()
    {
        $coachRole = CoachRole::factory()->create();

        $response = $this->get('/api/coach-role/' . $coachRole->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $coachRole->id,
                'Denomination' => $coachRole->Denomination
            ]]);
    }

    public function testStore()
    {
        $coachRoleData = [
            'Denomination' => 'Head Coach'
        ];

        $response = $this->post('/api/coach-role', $coachRoleData);

        $response->assertStatus(201)
            ->assertJson(['data' => $coachRoleData]);

        $this->assertDatabaseHas('coach_roles', $coachRoleData);
    }

    public function testUpdate()
    {
        $coachRole = CoachRole::factory()->create();

        $updatedData = [
            'Denomination' => 'Assistant Coach'
        ];

        $response = $this->put('/api/coach-role/' . $coachRole->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson(['data' => $updatedData]);

        $this->assertDatabaseHas('coach_roles', $updatedData);
    }

    public function testDestroy()
    {
        $coachRole = CoachRole::factory()->create();

        $response = $this->delete('/api/coach-role/' . $coachRole->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $coachRole->id,
                'Denomination' => $coachRole->Denomination
            ]]);

        $this->assertDatabaseMissing('coach_roles', ['id' => $coachRole->id]);
    }
}
