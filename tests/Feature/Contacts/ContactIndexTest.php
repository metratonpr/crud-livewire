<?php

namespace Tests\Feature\Contacts;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
/**
 * @group contacts
 * @group contactIndex
 */
class ContactIndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_exist_components_contact()
    {

        $this->actingAs(User::factory()->withPersonalTeam()->create())
        ->get(route('contacts.index'))
        ->assertSeeLivewire('contacts.contact-new')
        ->assertSeeLivewire('contacts.contact-list');
    }
}
