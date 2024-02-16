<?php

namespace Tests\Feature;

use App\Models\Attendee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendeeTest extends TestCase
{
    
    public function testGetAttendeeByEvents() 
    {
        $response = $this->get('/api/events/11/attendees');
        $response->assertStatus(200);

    }

    public function testGetSingleAttendee()
    {
        $response=$this->get('/api/events/11/attendees/1');
        $response->assertStatus(200);

    }

}

