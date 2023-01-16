<div>
    <div>
        <label class="form-label"> Empresa:
            <input type="text" class="form-control @error('company') is-invalid @enderror" wire:model='company'>
            @error('company')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <button class="btn btn-primary" wire:click='saveCompany'>Guardar</button>
    </div>
    <div>
        <label class="form-label"> Ramas:
            <input type="text" class="form-control @error('branch') is-invalid @enderror" wire:model='branch'>
            @error('branch')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <button class="btn btn-primary" wire:click='saveBranch'>Guardar</button>
    </div>
    <div>
        <label class="form-label"> Ambiente:
            <input type="text" class="form-control @error('environment.name') is-invalid @enderror" wire:model='environment.name'>
            @error('environment.name')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <label class="form-label"> Empresas:
            <select wire:model="environment.company_id" class="form-select">
                <option value=" ">Selecciona una empresa</option>
                @foreach ($companies as $key => $company)
                    <option value="{{$key}}">{{$company}}</option>
                @endforeach
            </select>
        </label>
        <button class="btn btn-primary" wire:click='saveEnvironment'>Guardar</button>
    </div>
</div>
