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
    ], $modal = [], $changeStatus = [], $title, $isEdit = [];

    public function mount()
    {
        $this->loadCompanies();
        $this->loadReminderStatuses();
        $this->loadReminders();

        foreach($this->reminders as $reminder)
        {   //status->id(función que hace la relación en el modelo, me saca el id)
            $this->changeStatus[$reminder->id] = $reminder->status->id;
        }
    }

    public function editTitle($id, $title)
    {
        $this->isEdit[$id] = true;
        $this->title = $title;

    }
    public function update($id)
    {
        $reminder = ModelsReminder::find($id);
        $reminder->update(['title' => $this->title]);
        $this->isEdit[$id] = false;
        $this->title = null;
        $this->loadReminders();
    }

    public function changeColor($status)
    {
        switch ($status) {
            case '1':
                return 'bg-warning';
                break;
            case '2':
                return 'bg-info';
                break;
            case '3':
                return 'bg-success';
                break;
            case '4':
                return 'bg-danger';
                break;
            case '5':
                return 'bg-secondary';
                break;

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
