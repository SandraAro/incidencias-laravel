<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Incidencias extends Component
{
    public function test()
    {
        dd('Lo que sea!');
    }
    public function render()
    {
        return view('livewire.incidencias');
    }
}
