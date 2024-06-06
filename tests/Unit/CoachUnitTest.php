<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Coach;
use App\Http\Controllers\CoachController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class CoachUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/api/coaches');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [['id', 'FullName', 'Birthdate', 'Degree', 'AssociationNumber']]]);
    }

    public function testShow()
    {
        $coach = Coach::factory()->create();

        $response = $this->get('/api/coach/' . $coach->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $coach->id,
                'FullName' => $coach->FullName,
                'Birthdate' => $coach->Birthdate,
                'Degree' => $coach->Degree,
                'AssociationNumber' => $coach->AssociationNumber
            ]]);
    }

    public function testStore()
    {
        $coachData = [
            'FullName' => 'John Doe',
            'Birthdate' => '1990-01-01',
            'Degree' => 'Bachelor',
            'AssociationNumber' => '123456'
        ];

        $response = $this->post('/api/coach', $coachData);

        $response->assertStatus(201)
            ->assertJson(['data' => $coachData]);

        $this->assertDatabaseHas('coaches', $coachData);
    }

    public function testUpdate()
    {
        $coach = Coach::factory()->create();

        $updatedData = [
            'FullName' => 'Updated Name',
            'Birthdate' => '1995-05-05',
            'Degree' => 'Master',
            'AssociationNumber' => '987654'
        ];

        $response = $this->put('/api/coach/' . $coach->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson(['data' => $updatedData]);

        $this->assertDatabaseHas('coaches', $updatedData);
    }

    public function testDestroy()
    {
        $coach = Coach::factory()->create();

        $response = $this->delete('/api/coach/' . $coach->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $coach->id,
                'FullName' => $coach->FullName,
                'Birthdate' => $coach->Birthdate,
                'Degree' => $coach->Degree,
                'AssociationNumber' => $coach->AssociationNumber
            ]]);

        $this->assertDatabaseMissing('coaches', ['id' => $coach->id]);
    }

    public function testTotalCoaches()
    {
        Coach::factory()->create();
        Coach::factory()->create();
        Coach::factory()->create();

        $controller = new CoachController();
        $total = $controller->totalCoaches();

        $this->assertEquals(3, $total);
    }
}
