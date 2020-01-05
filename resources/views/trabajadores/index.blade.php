@extends('layouts.bootstrap')
@section('titulopagina', 'Trabajadores')    {{-- Establecemos el titulo de la pagina --}}
@section('tituloseccion', 'Lista de Trabajadores') {{-- Pasamos el titulo de la seccion --}}
@section('contenidoprincipal')

<div class="row mt-3 mb-3">

    <div class="col-xs-12 col-md-6">
        <form id="form-buscar-persona" class=" " action=" ">
          <div class="input-group input-group-built-in">
            <input type="text" class="form-control" placeholder="Buscar" placeholder="Buscar" 
            autofocus name="buscar" value="{{request()->query('buscar')}}">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-outline-info">Buscar</button>
            </span>
          </div>
        </form>    
    </div>

    <div class="col-md-6 text-right">

        <a href="{{ route('personas.create') }}" class="btn btn-outline-success">Crear</a>
    </div>

</div>

<div class="table-responsive">
    @if ( count($trabajadores) > 0)
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Area</th>
                    <th>Cargo</th>
                    <th>Sueldo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $trabajadores as $trabajador )
                <tr>
                    <td>
                        {{ $loop->iteration + $trabajadores->perPage() * ($trabajadores->currentPage() - 1) }}
                    </td>
                    <td>
                        {{ $trabajador->dni }}
                    </td>
                    <td>
                        {{ $trabajador->paterno . ' ' . $trabajador->materno . ' ' . $trabajador->nombre }}
                    </td>
                    <td>
                        {{ $trabajador->area ? $trabajador->area->nombre : '' }}
                    </td>
                    
                    <td>
                        {{ $trabajador->cargo ? $trabajador->cargo->nombre : '' }}
                    </td>

                    <td>
                        {{ $trabajador->sueldo }}
                    </td>
                    <td>
                        <a href="{{ route('trabajadores.edit', $trabajador->id) }}" 
                            class="btn btn-link text-primary">
                        Editar
                    </a>
                    </td>

                    <td>
                        <form action="{{ route('trabajadores.delete', $trabajador->id ) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link text-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        No se encontrador datos de personas
    @endif
</div>

<div>
    {!! 
        $trabajadores->appends( [ 'buscar' => request('buscar'), 'sort'=>request('sort') ] )
                    ->links('pagination::bootstrap-4') 
    !!}
</div>

@endsection