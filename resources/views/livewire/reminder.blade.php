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

    <div class="col-9 row mt-2 p-1 m-0">
        @foreach ($reminders as $reminder)
        <div class="col-4">
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
                            {{--   --}}
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

{{-- Prueba este codigo si funcioan todos los colores y si los focus son del mismo color del boton: --}}

{{-- <div class="b-box-content me-1-all row jc-center" style="align-items: baseline;">
    <div bg="dark" class="p-1">
        <button class="b-btn" color="default">default</button>
    </div>
        <button class="b-btn" color="alternate">alternate</button>
        <button class="b-btn" color="green">green</button>
        <button class="b-btn" color="chartreuse">chartreuse</button>
        <button class="b-btn" color="yellow">yellow</button>
        <button class="b-btn" color="orange">orange</button>
        <button class="b-btn" color="red">red</button>
        <button class="b-btn" color="light-blue">light-blue</button>
        <button class="b-btn" color="aqua">aqua</button>
        <button class="b-btn" color="turq">turq</button>
        <button class="b-btn" color="blue">blue</button>
        <button class="b-btn" color="indigo">indigo</button>
        <button class="b-btn" color="purple">purple</button>
        <button class="b-btn" color="dark-pink">dark-pink</button>
        <button class="b-btn" color="pink">pink</button>
        <button class="b-btn" color="white">white</button>
        <button class="b-btn" color="gray">gray</button>
        <button class="b-btn" color="dark-gray">dark-gray</button>
        <button class="b-btn" color="black">black</button>
        <button class="b-btn" color="link">link</button>
    </div> --}}
</div>
