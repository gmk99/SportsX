<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testHome()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function testContact()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
}
