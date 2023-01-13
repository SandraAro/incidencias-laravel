<div>
    <div>
        <label class="form-label"> Empresa:
            <input type="text" class="form-control @error('company') is-invalid @enderror" wire:model='company'>
            @error('company')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <button class="btn btn-primary" wire:click='saveCompany' id="liveToastBtn">Guardar</button>
    </div>
    <div>
        <label class="form-label"> Ramas:
            <input type="text" class="form-control @error('branch') is-invalid @enderror" wire:model='branch'>
            @error('branch')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <button class="btn btn-primary" wire:click='saveBranch' id="liveToastBtn">Guardar</button>
    </div>
    <div>
        <label class="form-label"> Ambiente:
            <input type="text" class="form-control @error('environment') is-invalid @enderror" wire:model='environment'>
            @error('environment')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
        </label>
        <button class="btn btn-primary" wire:click='saveEnvironment' id="liveToastBtn">Guardar</button>
    </div>
</div>
