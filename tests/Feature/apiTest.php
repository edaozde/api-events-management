<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class apiTest extends TestCase
{
    /**
     * Teste la réussite du endpoint GET /events
     *
     * @return void
     */
    public function testGetEventsEndpoint()
    {
        $response = $this->get('/api/events');

        $response->assertStatus(200); 
    }

    public function testSingleEventEndpoint()
    {
        $response = $this->get('/api/events/9');

        $response->assertStatus(200);
    }
}
