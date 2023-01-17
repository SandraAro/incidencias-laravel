<div class="row m-0">
    <div class="col-3">
        <label class="form-label"> Titulo:
            <input type="text" class="form-control" wire:model="reminder.title">
        </label>
        <label class="form-label"> Descripción:
            <input type="text" class="form-control" wire:model='reminder.description'>
        </label>
        <label class="form-label"> Fecha Redordatorio:
            <input type="datetime-local" class="form-control" wire:model='reminder.date'>
        </label>
        <label >
            <select class="form-select" wire:model='reminder.company_id'>
                <option value=" ">Selecciona una compañia</option>
                @foreach ($companies as $key => $company)
                    <option value="{{$key}}">{{$company}}</option>
                @endforeach
            </select>
        </label>
        <button class="btn btn-primary" wire:click='saveReminder'>Crear</button>
    </div>

    <div class="col-12 row mt-2 p-1 m-0">
        @foreach ($reminders as $reminder)
        <div class="col-3 col-sm-6 col-md-3">
            <div class="card mb-1">
                <div class="card-body">
                    <h4 class="fw-bold text-info">{{$reminder->title}}</h4>
                    <p>{{$reminder->description}}</p>
                    <span class="badge bg-primary">{{$reminder->date}}</span>
                    <span class="badge bg-success">{{$reminder->status->name}}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
