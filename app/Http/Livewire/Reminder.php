<?php

namespace App\Http\Livewire;

use App\Models\Reminder as ModelsReminder;
use App\Traits\selectsTrait;
use Livewire\Component;

class Reminder extends Component
{
    use selectsTrait;

    public $reminder = [
        'title'              => null,
        'description'        => null,
        'reminder_status_id' => 1,
        'company_id'         => null,
        'date'               => null
    ];

    public function mount()
    {
        $this->loadCompanies();
        $this->loadReminderStatuses();
        $this->loadReminders();
    }

    public function saveReminder()
    {
        try{
            ModelsReminder::create($this->reminder);
            $this->loadReminders();
            $this->emit('showAlert', "Creado");
        }catch(\Exception $e){
            $this->emit('showAlert', "Error");
        }
    }

    public function render()
    {
        return view('livewire.reminder');
    }
}
