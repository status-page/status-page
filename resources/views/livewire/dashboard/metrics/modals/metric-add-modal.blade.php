<div class="normal-case">
    <div class="text-right">
        <x-jet-button wire:click="start">
            {{ __('Add Metric') }}
        </x-jet-button>
    </div>

    <div class="text-left">
        <x-jet-dialog-modal wire:model="modal">
            <x-slot name="title">
                {{ __('Add Metric') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="title" class="text-lg" value="{{ __('Title') }}" />
                    <x-input-dark id="title" type="text" class="mt-1 block w-full" wire:model="metric.title" />
                    <x-jet-input-error for="metric.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="suffix" class="text-lg" value="{{ __('Suffix') }}" />
                    <x-input-dark id="suffix" type="text" class="mt-1 block w-full" wire:model="metric.suffix" />
                    <x-jet-input-error for="metric.suffix" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="order" class="text-lg" value="{{ __('Order') }}" />
                    <x-input-dark id="order" type="number" class="mt-1 block w-full" wire:model="metric.order" />
                    <x-jet-input-error for="metric.order" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="visibility" class="text-lg" value="{{ __('Visibility') }}" />
                    <x-input-dark id="visibility" type="checkbox" class="mt-1 block" wire:model="metric.visibility" />
                    <x-jet-input-error for="metric.visibility" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4">
                    <x-jet-label for="collapse" class="text-lg" value="{{ __('Expand') }}" />
                    <select id="collapse" wire:model="metric.collapse" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md dark:bg-discordDark dark:border-discordBlack">
                        <option value="expand_always">Expand always</option>
                        <option value="expand_click">Expand on Click</option>
                    </select>
                    <x-jet-input-error for="metric.collapse" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                    {{ __('global.abort') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
