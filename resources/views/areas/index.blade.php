@extends('layouts.adminlte3.adminlte3')

@section('tituloseccion', 'Admistracion')

@section('breadcrumbs')
    
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Admistracion</a></li>
        <li class="breadcrumb-item active">Areas</li>
    </ol>
@endsection


@section('contenidoprincipal')

@can('public.areas.listar')

<div class="card">
    <div class="card-header">
        <h3>Areas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="row justify-content-center">
            <div class="col-md-12">
    
                <div class="row py-3 pr-3">
                    <div class="col-xs-12 col-sm-6">
                        <form id="form-buscar-areas" class="" action="">
                            <div class="input-group input-group-built-in">
                                <input type="text" class="form-control rounded-1" 
                                placeholder="Buscar" aria-label="Buscar" autofocus name="buscar" 
                                value="{{request()->query('buscar')}}">

                                <span class="input-group-btn">
                                    <a href="#" class="btn btn-outline-info" 
                                    onclick="event.preventDefault(); 
                                    document.getElementById('form-buscar-areas').submit();">
                                        Buscar
                                    </a>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-6 justify-content-end text-right">
                        
                        @can('public.areas.crear')
                            <a href="{{ route('areas.create') }}" class="btn btn-info text-white">Exportar excel</a>
                        @endcan

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nivel</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Area padre</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($areas as $area)
                                <tr>
                                    <td>
                                        {{ $loop->iteration + $areas->perPage() * ($areas->currentPage() - 1) }}
                                    </td>
                                    <td>{{ $area->nivel->nombre }}</td>
                                    <td>{{ $area->codigo }}</td>
                                    <td>{{ $area->nombre }}</td>
                                    <td>{{ $area->areapadre ?  $area->areapadre->nombre : '' }}</td>
                                    
                                    <td>
                                        @can('public.areas.editar')
                                            <a href="{{ route('areas.edit', $area->id) }}">Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('public.areas.eliminar')
                                            <form id="form.areas.delete.{{$area->id}}" 
                                                action="{{ route('areas.destroy', $area->id) }}" 
                                                method="POST">
                                                {!! method_field('DELETE') !!}
                                                {!! csrf_field() !!}
                                                <a 
                                                class="text-danger areas" 
                                                href="#"
                                                onclick="event.preventDefault(); document.getElementById('form.areas.delete.{{$area->id}}').submit();"
                                                >
                                                Eliminar
                                                <a/>
                                            </form>
                                        @endcan
                                    </td>                                        
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- /.card-body -->

</div>

@endcan

@endsection
