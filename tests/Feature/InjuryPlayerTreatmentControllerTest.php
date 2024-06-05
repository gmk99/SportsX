<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\InjuryPlayerTreatment;

class InjuryPlayerTreatmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/injury-player-treatments');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'Notes' => 'Treatment notes',
            'InjuryPlayerID' => 1,
            'PhysiotherapistID' => 1
        ];

        $response = $this->post('/injury-player-treatments', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('injury_player_treatments', $data);
    }

    public function testShow()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();
        $response = $this->get('/injury-player-treatments/' . $injuryPlayerTreatment->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();
        $data = [
            'Notes' => 'Updated treatment notes',
        ];

        $response = $this->put('/injury-player-treatments/' . $injuryPlayerTreatment->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('injury_player_treatments', $data);
    }

    public function testDestroy()
    {
        $injuryPlayerTreatment = InjuryPlayerTreatment::factory()->create();
        $response = $this->delete('/injury-player-treatments/' . $injuryPlayerTreatment->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('injury_player_treatments', ['id' => $injuryPlayerTreatment->id]);
    }
}
