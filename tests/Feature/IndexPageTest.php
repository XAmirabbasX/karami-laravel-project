<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('ورود');
    }
}
