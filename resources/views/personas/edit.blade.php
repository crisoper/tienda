@extends('layouts.bootstrap')

{{-- Establecemos el titulo de la pagina --}}
@section('titulopagina', 'Personas')

{{-- Pasamos el titulo de la seccion --}}
@section('tituloseccion', 'Editar Persona')


@section('contenidoprincipal')

<div class="row">

    <div class="col-sm-12">

        <form action="{{ route('personas.update', $persona->id) }}" method="POST">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dni">DNI</label>
                    <input type="text" id="dni" name="dni" class="form-control" value="{{ $persona->dni }}">
                    <div class="text-danger">{{ $errors->first('dni') }}</div>
                </div>
                <div class="form-group col-md-6">
                    <label for="paterno">Apellido paterno</label>
                    <input type="text" id="paterno" name="paterno" class="form-control" value="{{ $persona->paterno }}">
                    <div class="text-danger">{{ $errors->first('paterno') }}</div>
                </div>
            </div>

            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="materno">Apellido materno</label>
                    <input type="text" id="materno" name="materno" class="form-control" value="{{ $persona->materno }}">
                    <div class="text-danger">{{ $errors->first('materno') }}</div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $persona->nombre }}">
                    <div class="text-danger">{{ $errors->first('nombre') }}</div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" class="form-control" value="{{ $persona->correo }}">
                    <div class="text-danger">{{ $errors->first('correo') }}</div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="direccion">Direccion</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $persona->direccion }}">
                    <div class="text-danger">{{ $errors->first('direccion') }}</div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="celular">Celular</label>
                    <input type="text" id="celular" name="celular" class="form-control" value="{{ $persona->celular }}">
                    <div class="text-danger">{{ $errors->first('celular') }}</div>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="fechanacimiento">Fechanacimiento</label>
                    <input type="date" id="fechanacimiento" name="fechanacimiento" class="form-control" value="{{ $persona->fechanacimiento }}">
                    <div class="text-danger">{{ $errors->first('fechanacimiento') }}</div>
                </div>

                <div class="form-group col-md-4">
                    Sexo    <br>
                    <br>
                    <label>
                        <input type="radio" name="sexo" value="M"
                        @if( $persona->sexo == "M" )
                            checked
                        @endif
                        > 
                        Masculino
                    </label>
                    <label>
                        <input type="radio" name="sexo" value="F"
                        @if( $persona->sexo == "F" )
                            checked
                        @endif
                        > 
                        Femenino
                    </label>

                    <div class="text-danger">{{ $errors->first('sexo') }}</div>
                </div>
            </div>
            
            {!! method_field('PUT') !!}
            
            {!! csrf_field() !!}


            <button type="submit" class="btn btn-info">Actualizar</button>
            <a href="{{ route('personas.index') }}" class="btn btn-danger">Cancelar</a>
        
        </form>
        
    </div>
</div>

@endsection