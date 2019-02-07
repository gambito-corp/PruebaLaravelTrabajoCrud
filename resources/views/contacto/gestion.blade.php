@extends('layouts.app')

<style>
    .modalDialog {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0,0,0,0.4);
        z-index: 10;
        opacity:0;
        overflow: scroll;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }
    .modalDialog:target {
        opacity:1;
        pointer-events: auto;
    }
    .modalDialog > .divmodal {
        width: 50%;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: #f2f2f2;
        background: -moz-linear-gradient(#fff, #fff);
        background: -webkit-linear-gradient(#fff, #fff);
        background: -o-linear-gradient(#fff, #fff);
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
    }
    .close {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
    .close:hover { background: #00d9ff; }
    .hidden{
        display: none;
    }
    .enlace{
        color:black;
        text-decoration: none;
    }
</style>

@section('content')
<div class="container">
    <div class="justify-content-center">
        <h1 class="text-capitalize">administrar contactos</h1>
        <a href="{{route('contacto.contactanos')}}" class='btn btn-info'>Crear Contacto</a>
    </div>
</div>

<br>

<div class="container">
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <br>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>edad</th>
                <th>telefono</th>
                <th>correo</th>
                <th>mensaje</th>
                <th colspan="2">ACCIONES</th>
                <th class="hidden">Contenido Largo</th>


            </tr>
        </thead>
        <tbody>
            @forelse($contactos as $contacto)
            <tr>
                
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->id}}</a></td>
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->nombre}}</a></td>
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->apellido}}</a></td>
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->edad}}</a></td>
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->telefono}}</a></td>
                    <td><a class="enlace" href="{{route('contacto.perfil', ['id'=> $contacto->id])}}">{{$contacto->correo}}</a></td>
                    <td>
                        <?= $contacto->mensajeA = substr($contacto->mensaje, 0, 20) ?>
                        <br>
                        <a href="#openModal_{{$contacto->id}}">
                            ...ver mas
                        </a>
                        <!-- Ventana Modal -->
                        <div id="openModal_{{$contacto->id}}" class="modalDialog">
                            <div class="divmodal">
                                <a href="#close" title="Close" class="close">X</a>
                                <h2>Mensaje de {{$contacto->nombre}}</h2>
                                <hr>
                                <p><?= $contacto->mensaje ?></p>
                            </div>
                        </div>
                        <!-- fin de ventana modal-->
                    </td>
      

                <td><a class="btn btn-info" href="{{  route('contacto.editar', ['id' =>$contacto->id])}}" target="_self"><span><i class="icon-eye-open"></i> Editar</span></a></td>
                <td>
                    <a class="btn btn-danger" href="#openModalEliminar_{{ $contacto->id }}" target="_self"><span><i class="icon-remove-sign"></i> Eliminar</span></a>
                    <!-- Ventana Modal -->
                    <div id="openModalEliminar_{{ $contacto->id }}" class="modalDialog">
                        <div class="divmodal">
                            <a href="#close" title="Close" class="close">X</a>
                            <center>
                                <h2>Desea eliminar {{ $contacto->nombre }}</h2>
                                <a class='btn btn-danger' href='{{  route('contacto.eliminar', ['id' =>$contacto->id])}} ' target='_self' ><span><i class="icon-location-arrow"  ></i> Eliminar</span></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class='btn btn-success' href='#close' target='_self' ><span><i class="icon-location-arrow"  ></i> no eliminar</span></a>
                            </center>
                        </div>
                    </div>
                    <!-- fin de ventana modal-->

                </td>

                <td class="hidden">
                    vacio
                </td>


            </tr>
            @empty
        <h2>vacio</h2>
        @endforelse
        </tbody>
    </table>
</div>

@endsection