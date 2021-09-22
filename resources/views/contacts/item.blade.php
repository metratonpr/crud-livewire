<div>
    {{-- The whole world belongs to you. --}}
    <button class="cursor-pointer ml-6 text-sm text-gray-400 underline focus:outline-none hover:text-teal-700"
        wire:click="edit({{$contact}})">
        {{__('Edit')}}
    </button>
    <button class="cursor-pointer ml-6 text-sm text-gray-400 underline focus:outline-none hover:text-teal-700"
        wire:click="confirmDeletion({{$contact}})">
        {{__('Delete')}}
    </button>
    <x-jet-dialog-modal wire:model="updating">
        <x-slot name="title">{{__('Update a Contact')}}</x-slot>
        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="contact.name" value="{{__('Name')}}" />
                <x-jet-input id="contact.name" type="text" class="mt-1 block w-full" wire:model.defer="contact.name"
                    autofocus />
                <x-jet-input-error for="contact.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="contact.email" value="{{__('E-mail')}}" />
                <x-jet-input id="contact.email" type="text" class="mt-1 block w-full" wire:model.defer="contact.email"
                    autofocus />
                <x-jet-input-error for="contact.email" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="contact.phone" value="{{__('Phone')}}" />
                <x-jet-input id="contact.phone" type="text" class="mt-1 block w-full" wire:model.defer="contact.phone"
                    autofocus />
                <x-jet-input-error for="contact.phone" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="contact.message" value="{{__('Message')}}" />
                <textarea id="contact.message" class="mt-1 block w-full" wire:model.defer="contact.message" autofocus>
                </textarea>
                <x-jet-input-error for="contact.message" class="mt-2" />
            </div>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('updating')" wire:loading.attr="disabled">
                    {{__('Nevermind')}}
                </x-jet-secondary-button>
                <x-jet-button wire:click="update" wire:loading.attr="disabled">
                    {{__('Save')}}
                </x-jet-button>
            </x-slot>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-confirmation-modal wire:model='destroying'>
        <x-slot name="title">{{__('Destroy Contract')}}</x-slot>
        <x-slot name="content">{{('Are you sure about it?')}}</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('destroying')" wire:loading.attr="disabled">
                {{__('Nevermind')}}
            </x-jet-secondary-button>
            <x-jet-button wire:click="destroy" wire:loading.attr="disabled">
                {{__('Destroy')}}
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>