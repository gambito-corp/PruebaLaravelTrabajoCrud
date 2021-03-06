@extends('layouts.app')

@section('content')
<div class="container">
     @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">contactanos</div>
                <div class="card-body">
                    <form name="contacto" action="{{route('contacto.guardar')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre*: </label>                        
                            <input type="text" name="nombre" value="" size="40" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}"  required/> 

                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif                                       
                        </div>

                        <div class="form-group">
                            <label for="apellido">apellido*: </label>                        
                            <input type="text" name="apellido" value="" size="40" class="form-control {{ $errors->has('apellido') ? ' is-invalid' : '' }}"  required/> 

                            @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif                                       
                        </div>


                        <div class="form-group">
                            <label for="edad">edad*: </label>                        
                            <input type="number" name="edad" value="" size="3" class="form-control {{ $errors->has('edad') ? ' is-invalid' : '' }}"  required/>    

                            @if ($errors->has('edad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                                @endif                                    
                        </div>

                        <div class="form-group">
                            <label for="telefono">telefono*: </label>                        
                            <input type="tel" name="telefono" value="" size="11" class="form-control {{ $errors->has('telefono') ? ' is-invalid' : '' }}"  required/>  

                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif                                      
                        </div>

                        <div class="form-group">
                            <label for="correo">correo*: </label>                        
                            <input type="email" name="correo" value="" size="40" class="form-control {{ $errors->has('correo') ? ' is-invalid' : '' }}"  required/>  

                            @if ($errors->has('correo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                                @endif                                      
                        </div>

                        <div class="form-group">
                            <label for="mensaje">mensaje*: </label>                        
                            <textarea name="mensaje" class="form-control {{ $errors->has('mensaje') ? ' is-invalid' : '' }}"  required/></textarea>     

                            @if ($errors->has('mensaje'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mensaje') }}</strong>
                                </span>
                                @endif                                   
                        </div>

                            <input type="submit" value="Contactanos!" class="btn btn-success" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection