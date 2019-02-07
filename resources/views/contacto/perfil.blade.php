@extends('layouts.app')

@section('content')
<div class="container">
     @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ver {{$contacto->nombre}}</div>
                <div class="card-body">
                    <h2>{{$contacto->nombre. ' '.$contacto->apellido}}</h2><br>
                    <p>el candidato posee la edad de   {{$contacto->edad}} años</p>
                    <p>dejo el siguiente mensaje <br>{{$contacto->mensaje}}</p>
                    <br>
                    <p>nos podemos contactar con el a traves del <br> <span class="resaltado">correo:</span> <a href="mailto:{{$contacto->correo}}">{{$contacto->correo}}</a> <br>o del <br> <span class="resaltado">Telefono:</span> <a href="tel:+51{{$contacto->telefono}}">{{$contacto->telefono}}</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection