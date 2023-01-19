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
    ], $modal = [], $changeStatus = [];

    public function mount()
    {
        $this->loadCompanies();
        $this->loadReminderStatuses();
        $this->loadReminders();

        foreach($this->reminders as $reminder)
        {
            $this->changeStatus[$reminder->id] = $reminder->status->id;
        }
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

    public function delete($id,$confirm = false)
    {
        $this->modal[$id] = true;

        if ($confirm) {
            $reminder = ModelsReminder::find($id);
            $reminder->delete();
            $this->modal[$id] = false;
            $this->loadReminders();
        }
    }

    public function modalClose()
    {
        $this->modal = [];

    }

    public function changeStatus($id)
    {
       $reminder = ModelsReminder::find($id);
       $reminder->update(['reminder_status_id' => $this->changeStatus[$id]]);
       $this->loadReminders();
    }

    public function render()
    {
        return view('livewire.reminder');
    }
}
