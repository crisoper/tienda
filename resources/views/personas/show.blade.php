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

        <div class="form-row">
            <div class="form-group col-md-6">
                <img width="150px" src="{{ asset( Storage::url('tienda/'.$persona->foto) ) }}">
            </div>
        </div>

        <a href="{{ route('personas.index') }}" class="btn btn-info">Voler</a>
        
    </div>
</div>

@endsection