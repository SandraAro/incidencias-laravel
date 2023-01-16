<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Company as ModelsCompany;
use App\Models\Environment;
use Livewire\Component;

class Company extends Component
{
    public $company, $branch, $companies;

    public $environment = [
        'name'=> null,
        'company_id' => null
    ];

    public function mount()
    {
        $this->loadCompanies();
    }

    public function loadCompanies()
    {
        $this->companies = ModelsCompany::pluck('name', 'id');
    }

    public function saveCompany()
    {
        $this->validate([
            'company' => 'required|string'
        ]);
        try{
            $company = new ModelsCompany();
            $company->name = $this->company;
            $company->save();
            $this->loadCompanies();
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
    public function saveEnvironment()
    {
        $this->validate([
            'environment.name'  => 'required|string',
            'environment.company_id'  => 'required|integer'
        ]);

        try{
            $environment = new Environment();
            $environment->name = $this->environment['name'];
            $environment->company_id = $this->environment['company_id'];
            $environment->save();
            $this->environment = [];
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
