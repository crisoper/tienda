@extends('layouts.bootstrap')

{{-- Establecemos el titulo de la pagina --}}
@section('titulopagina', 'Personas')

{{-- Pasamos el titulo de la seccion --}}
@section('tituloseccion', 'Editar Persona')


@section('contenidoprincipal')

<div class="row">
    <div class="col">
            <h2>{{ $persona->paterno }} {{ $persona->materno }} {{ $persona->nombre }}</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('personas.storesubirfoto', $persona->id) }}" method="POST" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="foto">Foto</label>
                    <input type="file" id="foto" name="foto" class="form-control" value="{{ $persona->foto }}">
                    <div class="text-danger">{{ $errors->first('foto') }}</div>
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