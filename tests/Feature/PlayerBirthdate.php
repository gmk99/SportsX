<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_gets_a_validation_error_if_birthdate_is_invalid()
    {
        // Data de nascimento inválida antes de 1965-01-01
        $response = $this->postJson('/players', [
            'FullName' => 'John Doe',
            'Birthdate' => '1960-01-01',
            'AssociationNumber' => '12345',
            'PhoneNumber' => '555-555-5555',
            'PositionID' => 1,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['Birthdate']);

        // Data de nascimento inválida depois da data atual
        $response = $this->postJson('/players', [
            'FullName' => 'John Doe',
            'Birthdate' => now()->addDay()->format('Y-m-d'),
            'AssociationNumber' => '12345',
            'PhoneNumber' => '555-555-5555',
            'PositionID' => 1,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['Birthdate']);
    }
}
