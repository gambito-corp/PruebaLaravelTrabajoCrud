@extends('layouts.app')

@section('content')
<div class="container">
     @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar {{$contacto->nombre}}</div>
                <div class="card-body">
                    <form name="contacto" action="{{route('contacto.actualizar')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$contacto->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre*: </label>                        
                            <input type="text" name="nombre" size="40" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{$contacto->nombre}}"/>


                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif                                                                
                        </div>

                        <div class="form-group">
                            <label for="apellido">apellido*: </label>                        
                            <input type="text" name="apellido" size="40" class="form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ $contacto->apellido }}"/>

                            @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif                                                                
                        </div>


                        <div class="form-group">
                            <label for="edad">edad*: </label>                        
                            <input type="number" name="edad" size="3" class="form-control {{ $errors->has('edad') ? ' is-invalid' : '' }}" value="{{ $contacto->edad }}"/>

                            @if ($errors->has('edad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                                @endif                                                                
                        </div>

                        <div class="form-group">
                            <label for="telefono">telefono*: </label>                        
                            <input type="tel" name="telefono" size="11" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ $contacto->telefono }}"/>

                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif                                                                
                        </div>

                        <div class="form-group">
                            <label for="correo">correo*: </label>                        
                            <input type="email" name="correo" size="40" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}" value="{{ $contacto->correo }}"/>

                            @if ($errors->has('correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                                @endif                                                                
                        </div>

                        <div class="form-group">
                            <label for="mensaje">mensaje*: </label>                        
                            <textarea name="mensaje" class="form-control {{ $errors->has('mensaje') ? ' is-invalid' : '' }}"  required/>{{ $contacto->mensaje }}</textarea>

                            @if ($errors->has('mensaje'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mensaje') }}</strong>
                                </span>
                                @endif                                        
                        </div>

                            <input type="submit" value="editar" class="btn btn-success" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection