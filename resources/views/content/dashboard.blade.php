@extends('layout')

@section('content')

    <div class="row align-items-center bg-light m-0 vh-100" style="background-image: linear-gradient(to top, rgba(201, 184, 240, 0.5) 0%, rgba(255, 144, 79, 0.9) 100%),url( {{ asset('images/background.jpg') }});background-size: cover;background-attachment: fixed;">
        <div class="col-6 d-flex justify-content-around">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/incidencias.svg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Incidencias</h5>
                  <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
                  <a href="#" class="btn btn-primary">Ir a incidencias</a>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-around">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/recordatorios.svg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Recordatorios</h5>
                  <p class="card-text">Un texto de ejemplo rápido para colocal cerca del título de la tarjeta y componer la mayor parte del contenido de la tarjeta.</p>
                  <a href="#" class="btn btn-primary">Ir a recordatorios</a>
                </div>
            </div>
        </div>

    </div>

@endsection
