<?php

namespace Tests\Feature\Contact;

use App\Http\Livewire\Contacts\ContactItem;
use App\Models\Domain\Contact\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @group contacts
 * @group contactItem
 */

class ContactItemTest extends TestCase
{
   use RefreshDatabase;

   /**
    * @test
    */
   public function test_can_updated_contact()
   {
      $this->actingAs($user = User::factory()->withPersonalTeam()->create());

      $contactFake = Contact::factory()->create();

      $contactFake->name = "update name";
      $contactFake->email = "update@email.com";

      Livewire::test(ContactItem::class, ['contact' => $contactFake])
         ->call('update')
         ->assertEmitted('updated')
         ->assertEmitted('refreshList');

      $this->assertDatabaseHas('contacts', [
         'name' => 'update name',
         'email' => 'update@email.com'
      ]); 
     
   }

   public function test_can_destroy_contact()
   {
      $this->actingAs($user = User::factory()->withPersonalTeam()->create());

      $contactFake = Contact::factory()->create();

     

      Livewire::test(ContactItem::class,)
         ->call('confirmDeletion', $contactFake)
         ->call('destroy')
         ->assertEmitted('destroyed')
         ->assertEmitted('refreshList');

      // $this->assertDatabaseMissing('contacts', $contactFake->toArray()); 
     
   }
  
}
