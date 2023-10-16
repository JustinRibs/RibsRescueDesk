<?php

namespace Tests\Feature;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function test_new_ticket_assigned_to_is_null()
    // {
    //     $ticket = Ticket::create([
    //         'user_id' => 1,
    //         'title' => 'Test Ticket',
    //         'description' => 'feature ticket test',
    //         'priority' => 'low',
    //         'category' => 'WiFi',
    //     ]);

    //     $this->assertEquals(null, $ticket->assigned_to);
    // }
}
