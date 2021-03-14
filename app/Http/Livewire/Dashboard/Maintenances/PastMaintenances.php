<?php
/*
 * Copyright (c) 2021 by HerrTxbias.
 *
 * Using / Editing this without my consent is not allowed.
 */

namespace App\Http\Livewire\Dashboard\Maintenances;

use App\Events\ActionLog;
use App\Models\Incident;
use App\Models\IncidentUpdate;
use App\Models\Status;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PastMaintenances extends Component
{
    use WithPagination;

    protected $listeners = ['refreshData'];

    public function render()
    {
        ActionLog::dispatch(array(
            'user' => Auth::id(),
            'type' => 0,
            'message' => 'Past Incidents',
        ));
        return view('livewire.dashboard.maintenances.past-maintenances', [
            'old_maintenances' => Incident::getPastMaintenances(),
        ]);
    }

    public function refreshData(){
        $this->redirectRoute('dashboard.incidents.past');
    }
}