<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Injury;
use App\Http\Controllers\InjuryController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class InjuryUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        // Arrange
        $injuries = Injury::factory()->count(3)->create();

        // Act
        $response = $this->get(route('injuries.index'));

        // Assert
        $response->assertStatus(200)
            ->assertViewIs('pages.virtual-reality')
            ->assertViewHas('injuries', $injuries);
    }

    public function testEdit()
    {
        // Arrange
        $injury = Injury::factory()->create();

        // Act
        $response = $this->get(route('injuries.edit', ['id' => $injury->id]));

        // Assert
        $response->assertStatus(200)
            ->assertViewIs('pages.injury-edit')
            ->assertViewHas('injury', $injury);
    }

    public function testUpdate()
    {
        // Arrange
        $injury = Injury::factory()->create();
        $newData = [
            'Denomination' => $this->faker->word(),
            'Location' => $this->faker->word(),
            'EstimatedTimeToRecover' => $this->faker->word(),
        ];

        // Act
        $response = $this->put(route('injuries.update', ['id' => $injury->id]), $newData);

        // Assert
        $response->assertRedirect(route('injuries.index'))
            ->assertSessionHas('success', 'Injury updated successfully.');
        $this->assertDatabaseHas('injuries', $newData);
    }

    public function testDestroy()
    {
        // Arrange
        $injury = Injury::factory()->create();

        // Act
        $response = $this->delete(route('injuries.destroy', ['id' => $injury->id]));

        // Assert
        $response->assertRedirect(route('injuries.index'))
            ->assertSessionHas('success', 'Injury deleted successfully.');
        $this->assertDeleted($injury);
    }
}
