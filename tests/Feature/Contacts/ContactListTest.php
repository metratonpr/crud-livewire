<?php

namespace Tests\Feature\Contacts;

use App\Models\Domain\Contact\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group contacts
 * @group contactList
 */
class ContactListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_display_paginate_contact_list()
    {

        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $contactFake = Contact::factory(30)->make();

        Livewire::withQueryParams(['page' => 2])
            ->test(ContactList::class)
            ->assertPayloadSet('page',2);
    }
}
