<div class="normal-case">
    <div class="text-right">
        <x-jet-button wire:click="start">
            {{ __('users.new_user.button') }}
        </x-jet-button>
    </div>

    <div class="text-left">
        <x-jet-dialog-modal wire:model="modal">
            <x-slot name="title">
                {{ __('users.new_user.modal.title') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="name" class="text-lg" value="{{ __('users.new_user.modal.name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="user.name" />
                    <x-jet-input-error for="user.name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="email" class="text-lg" value="{{ __('users.new_user.modal.email') }}" />
                    <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="password" class="text-lg" value="{{ __('users.new_user.modal.password') }}" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model="password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="deactivated" class="text-lg" value="{{ __('users.new_user.modal.deactivated') }}" />
                    <x-jet-input id="deactivated" type="checkbox" class="mt-1 block" wire:model="user.deactivated" />
                    <x-jet-input-error for="user.deactivated" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="role" class="text-lg" value="{{ __('users.new_user.modal.role') }}" />
                    <select id="role" wire:model="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="admin">Admin</option>
                        <option value="reporter">Reporter</option>
                    </select>
                    <x-jet-input-error for="role" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                    {{ __('global.abort') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    {{ __('users.new_user.modal.save_button') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
