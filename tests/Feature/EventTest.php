<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{

    
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

    //Créer un évènement
/**
     * Teste la réussite du endpoint GET /events
     *
     * @return void
     */
    // public function testCreateAnEvent ()
    // {
    //     $eventData = [
    //         'name' => 'Wedding',
    //         'description' => 'This is a wedding party.',
    //         'start_time' => "2025-02-2 11:14:02",
    //         'end_time' => "2025-02-10 11:14:02",
    //         'user_id' => 10,
    //     ];

    //     $response = $this->post('/api/events', $eventData);

    //     $response->assertStatus(201);

    //     $this->assertDatabaseHas('events', [
    //         'name' => $eventData['name'],
    //         'description' => $eventData['description'],
    //         'user_id' =>10,
    //     ]);

    //     $this->assertDatabaseHas('events', $eventData);
    // }

   
}

  
    

