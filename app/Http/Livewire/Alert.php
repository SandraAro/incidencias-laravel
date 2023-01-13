<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $show = false, $msg;

    protected $listeners = ['showAlert'];

    public function showAlert($msg){
        $this->show = true;
        $this->msg = $msg;
    }

    public function closeAlert()
    {
        $this->show = false;
        $this->msg = null;

    }


    public function render()
    {
        return view('livewire.alert');
    }
}
