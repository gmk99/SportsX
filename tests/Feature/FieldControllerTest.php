<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Field;

class FieldControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/fields');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'FieldType' => 1,
            'Denomination' => 1
        ];

        $response = $this->post('/fields', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('fields', $data);
    }

    public function testShow()
    {
        $field = Field::factory()->create();
        $response = $this->get('/fields/' . $field->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $field = Field::factory()->create();
        $data = [
            'Denomination' => 2,
        ];

        $response = $this->put('/fields/' . $field->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('fields', $data);
    }

    public function testDestroy()
    {
        $field = Field::factory()->create();
        $response = $this->delete('/fields/' . $field->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('fields', ['id' => $field->id]);
    }
}
