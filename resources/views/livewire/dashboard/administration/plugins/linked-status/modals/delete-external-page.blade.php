<div>
    <button wire:loading.attr="disabled" wire:click="start" class="text-indigo-600 hover:text-indigo-900">{{ __('linked_status.modal_delete.button') }}</button>
    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">
            {{ __('linked_status.modal_delete.title') }}
        </x-slot>

        <x-slot name="content">
            {{ __('linked_status.modal_delete.text_r1', ['name' => $page->domain]) }}<br>
            {{ __('linked_status.modal_delete.text_r2') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                {{ __('global.abort') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('linked_status.modal_delete.delete_button') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
