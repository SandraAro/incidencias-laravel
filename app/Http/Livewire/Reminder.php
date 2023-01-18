<?php

namespace App\Http\Livewire;

use App\Models\Reminder as ModelsReminder;
use App\Traits\selectsTrait;
use Livewire\Component;

class Reminder extends Component
{
    use selectsTrait;

    public $reminder = [
        'reminder_status_id' => 1,
    ], $modal = [];

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

    public function delete($id)
    {
        $this->modal[$id] = true;
        // $reminder = ModelsReminder::find($id);
        // $reminder->delete();
        // $this->loadReminders();
    }

    public function modalClose()
    {
        $this->modal = [];

    }

    public function render()
    {
        return view('livewire.reminder');
    }
}
