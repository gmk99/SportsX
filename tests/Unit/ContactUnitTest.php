<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contact;
use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

class ContactUnitTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/api/contacts');

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => [['id', 'ContactID', 'PhoneNumber', 'Email']]]);
    }

    public function testShow()
    {
        $contact = Contact::factory()->create();

        $response = $this->get('/api/contact/' . $contact->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $contact->id,
                'ContactID' => $contact->ContactID,
                'PhoneNumber' => $contact->PhoneNumber,
                'Email' => $contact->Email
            ]]);
    }

    public function testStore()
    {
        $contactData = [
            'ContactID' => '1234',
            'PhoneNumber' => '1234567890',
            'Email' => 'test@example.com'
        ];

        $response = $this->post('/api/contact', $contactData);

        $response->assertStatus(201)
            ->assertJson(['data' => $contactData]);

        $this->assertDatabaseHas('contacts', $contactData);
    }

    public function testUpdate()
    {
        $contact = Contact::factory()->create();

        $updatedData = [
            'ContactID' => '5678',
            'PhoneNumber' => '0987654321',
            'Email' => 'updated@example.com'
        ];

        $response = $this->put('/api/contact/' . $contact->id, $updatedData);

        $response->assertStatus(200)
            ->assertJson(['data' => $updatedData]);

        $this->assertDatabaseHas('contacts', $updatedData);
    }

    public function testDestroy()
    {
        $contact = Contact::factory()->create();

        $response = $this->delete('/api/contact/' . $contact->id);

        $response->assertStatus(200)
            ->assertJson(['data' => [
                'id' => $contact->id,
                'ContactID' => $contact->ContactID,
                'PhoneNumber' => $contact->PhoneNumber,
                'Email' => $contact->Email
            ]]);

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
