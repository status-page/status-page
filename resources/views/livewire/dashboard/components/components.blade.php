<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('components.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-col space-y-4">
            <div class="flex justify-between">
                <div></div>
                <div class="space-x-2 flex items-center">
                    <x-input.group borderless paddingless for="perPage" label="Per Page">
                        <x-input.select wire:model="perPage" id="perPage" class="rounded-md">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </x-input.select>
                    </x-input.group>

                    @can('add_componentgroups')
                        @livewire('dashboard.components.modals.component-group-add-modal')
                    @endcan
                </div>
            </div>
            <div class="flex flex-col">
                @foreach($groups as $group)
                    <div>
                        <div class="mb-4">
                            <x-jet-section-title>
                                <x-slot name="title">
                                    <div class="flex justify-between">
                                        <div class="space-x-2 flex items-center">
                                            <div>
                                                Group: {{ $group->name }}
                                            </div>
                                            @can('edit_componentgroups')
                                                <livewire:dashboard.components.modals.component-group-update-modal :group="$group" :key="time().$group->id" />
                                            @endcan
                                            @can('delete_componentgroups')
                                                <livewire:dashboard.components.modals.component-group-delete-modal :group="$group" :key="time().time().$group->id" />
                                            @endcan
                                        </div>
                                        <div>
                                            @can('add_components')
                                                <livewire:dashboard.components.modals.component-add-modal :group="$group" :key="time().time().time().$group->id" />
                                            @endcan
                                        </div>
                                    </div>
                                </x-slot>
                                <x-slot name="description">
                                    ID: {{ $group->id }} | Visibility: {{ $group->visibility == 0 ? 'False' : 'True' }}
                                    @can('edit_componentgroups')
                                        <button wire:loading.attr="disabled" wire:click="changeVisibility({{ $group->id }}, {{ $group->visibility }})" class="text-indigo-600 hover:text-indigo-900">Switch Visibility</button>
                                    @endcan
                                    | Creator: {{ $group->user()->name }} | Order: {{ $group->order }}
                                </x-slot>
                            </x-jet-section-title>
                        </div>
                        <x-table>
                            <x-slot name="head">
                                <x-table.heading>ID</x-table.heading>
                                <x-table.heading>Name</x-table.heading>
                                <x-table.heading>Visibility</x-table.heading>
                                <x-table.heading>Order</x-table.heading>
                                <x-table.heading>Status</x-table.heading>
                                <x-table.heading>Creator</x-table.heading>
                                <x-table.heading></x-table.heading>
                            </x-slot>
                            <x-slot name="body">
                                @forelse($group->components() as $comp)
                                    <x-table.row wire:loading.class.delay="opacity-50">
                                        <x-table.cell>{{ $comp->id }}</x-table.cell>
                                        <x-table.cell>
                                            {{ $comp->name }}
                                            @if(\App\Statuspage\Helper\SPHelper::isManagedComponent($comp->id))
                                                <button data-title="{{ __('This Component is managed by a plugin.') }}" data-placement="top" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 focus:outline-none cursor-default">
                                                    Managed
                                                </button>
                                            @endif
                                        </x-table.cell>
                                        <x-table.cell>{{ $comp->visibility == 0 ? 'False' : 'True' }}</x-table.cell>
                                        <x-table.cell>{{ $comp->order }}</x-table.cell>
                                        <x-table.cell>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ str_replace('text-', 'bg-', $comp->status()->color) }} text-white">
                                                &nbsp;&nbsp;
                                            </span>
                                        </x-table.cell>
                                        <x-table.cell>{{ $comp->user()->name }}</x-table.cell>
                                        <x-table.cell>
                                            <div class="space-x-2 flex items-center">
                                                @can('edit_components')
                                                    <livewire:dashboard.components.modals.component-update-modal :comp="$comp" :key="time().$comp->id" />
                                                @endcan
                                                @can('delete_components')
                                                    <livewire:dashboard.components.modals.component-delete-modal :comp="$comp" :key="time().time().$comp->id" />
                                                @endcan
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                @empty
                                    <x-table.row>
                                        <x-table.cell colspan="7">
                                            <div class="flex justify-center items-center">
                                                <span class="font-medium py-8 text-gray-400 text-xl">No results...</span>
                                            </div>
                                        </x-table.cell>
                                    </x-table.row>
                                @endforelse
                            </x-slot>
                        </x-table>
                        <x-jet-section-border></x-jet-section-border>
                    </div>
                @endforeach
            </div>

            <div>
                {{ $groups->links() }}
            </div>
        </div>
    </div>
</div>
