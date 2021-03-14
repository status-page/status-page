<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('past.title_incidents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading>{{ __('past.tables.head.id')  }}</x-table.heading>
                    <x-table.heading>{{ __('past.tables.head.title')  }}</x-table.heading>
                    <x-table.heading>{{ __('past.tables.head.status')  }}</x-table.heading>
                    <x-table.heading>{{ __('past.tables.head.impact')  }}</x-table.heading>
                    <x-table.heading>{{ __('past.tables.head.reporter')  }}</x-table.heading>
                    <x-table.heading></x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @foreach($old_incidents as $incident)
                        <x-table.row>
                            <x-table.cell>{{ $incident->id }}</x-table.cell>
                            <x-table.cell>{{ $incident->title }}</x-table.cell>
                            <x-table.cell>{{ $incident->getType() }}</x-table.cell>
                            <x-table.cell>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $incident->getImpactColor() }} text-white">
                                    &nbsp;&nbsp;
                                </span>
                            </x-table.cell>
                            <x-table.cell>{{ $incident->getReporter()->name }}</x-table.cell>
                            <x-table.cell>
                                @can('delete_incidents')
                                    @livewire('dashboard.incidents.modals.incident-delete-modal', ['incident' => $incident], key($incident->id))
                                @endcan
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>

            <div>
                {{ $old_incidents->links() }}
            </div>
        </div>
    </div>
</div>

