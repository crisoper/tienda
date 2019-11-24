@extends('layouts.app')

@section('contenidoprincipal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    Tu has iniciado sesion
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('informacionautor')
     @parent
     <br>
     Contenido agregado en el template home
@endsection
