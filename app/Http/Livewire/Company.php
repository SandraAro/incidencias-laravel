<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Company as ModelsCompany;
use Livewire\Component;

class Company extends Component
{
    public $company, $branch;

    public function saveCompany()
    {
        $this->validate([
            'company' => 'required|string'
        ]);
        try{
            $company = new ModelsCompany();
            $company->name = $this->company;
            $company->save();
            $this->emit('showAlert', "Guardado");
        }catch(\Exception $e){
            $this->emit('showAlert', "Error");
        }
    }
    public function saveBranch()
    {
        $this->validate([
            'branch'  => 'required|string'
        ]);
        try{
            $branch = new Branch();
            $branch->name = $this->branch;
            $branch->save();
            $this->emit('showAlert', "Guardado");
        }catch(\Exception $e){
            $this->emit('showAlert', "Error");
        }
    }
    public function render()
    {
        return view('livewire.company');
    }
}
