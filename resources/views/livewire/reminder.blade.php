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
                    <div class="row">
                        <div class="col-8">
                        @if (@$isEdit[$reminder->id])
                           <input autofocus type="text" wire:model="title" wire:keydown.enter="update('{{$reminder->id}}')"/>
                        @else
                            <h4 class="fw-bold text-info" wire:click="editTitle('{{$reminder->id}}','{{$reminder->title}}')">{{$reminder->title}}</h4>
                        @endif
                        </div>
                        <div class="col-4 d-flex justify-content-end p-0 align-items-start">
                            <button class="btn btn-danger btn-sm" wire:click="delete({{$reminder->id}})" >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <p>{{$reminder->description}}</p>
                    <span class="badge bg-primary">{{$reminder->date}}</span>

                    <div class="row">
                        <div class="col-8">
                            {{-- <button class="b-btn-gradient" color="primary">Save</button> --}}
                        </div>
                        <div class="col-4 d-flex justify-content-end p-0 align-items-start">
                            <select class="form-select form-select-sm {{$this->changeColor($reminder->status->id)}} text-white mw-min d-inline-block" wire:model="changeStatus.{{$reminder->id}}" wire:change='changeStatus({{$reminder->id}})'>
                                @foreach ($reminderStatuses as $key => $status)
                                    <option value="{{$key}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if (@$modal[$reminder->id])
        <div class="modal show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Recordatorios</h5>
                  <button type="button" class="btn-close" wire:click="modalClose"></button>
                </div>
                <div class="modal-body">
                  <p>¿Eliminar recordatorio?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" wire:click="modalClose">No</button>
                  <button type="button" class="btn btn-primary" wire:click="delete({{$reminder->id}},true)">Si</button>
                </div>
              </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
