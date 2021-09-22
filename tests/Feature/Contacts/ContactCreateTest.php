<?php

namespace Tests\Feature\Contact;

use App\Http\Livewire\Contacts\ContactNew;
use App\Models\Domain\Contact\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
/**
 * @group contacts
 * @group contactCreate
 */

class ContactCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_can_create_contact()
    {
       $this->actingAs($user = User::factory()->withPersonalTeam()->create());

       $contactFake = Contact::factory()->make();

       Livewire::test(ContactNew::class,['contact'=>$contactFake])          
       ->call('store')
        ->assertEmitted('created')
        ->assertEmitted('refreshList');       

       $this->assertDatabaseHas('contacts',$contactFake->toArray());

    }

    /**
     * @test
     */
    public function test_cannot_create_contact_by_invalid_email()
    {
       $this->actingAs($user = User::factory()->withPersonalTeam()->create());

       $contactFake = Contact::factory()->make(['email'=> 'invalid']);

       Livewire::test(ContactNew::class,['contact'=>$contactFake])       
       ->call('store')
       ->assertHasErrors([
         'newContact.name' => 'required',
         'newContact.email' => 'required',
         'newContact.phone' => 'required',
         'newContact.message' => 'required'
       ]
       );
    }

    /**
     * @test
     */
    public function test_cannot_create_contact_by_empty_required_fields()
    {
       $this->actingAs($user = User::factory()->withPersonalTeam()->create());

       $contactFake = new Contact();

       Livewire::test(ContactNew::class,['contact'=>$contactFake])       
       ->call('store')
       ->assertHasErrors('newContact.email');
    }
}
