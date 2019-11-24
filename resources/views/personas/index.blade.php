@extends('layouts.bootstrap')
@section('titulopagina', 'Personas')    {{-- Establecemos el titulo de la pagina --}}
@section('tituloseccion', 'Lista de personas') {{-- Pasamos el titulo de la seccion --}}
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
        <a href="/personas/create" class="btn btn-outline-success">Crear</a>
    </div>

</div>

<div class="table-responsive">
@if ( count($personas) > 0)
    <table class="table table-sm table-striped">

        <thead>
            <tr>
                <th>
                    <a 
                        class="{{ request()->query('sort') == 'id' ? 'active' : 'text-dark'  }}" 
                        href="{{ request()->fullUrlWithQuery(['sort' => 'id']) }}"
                    >
                        Nro
                    </a>
                </th>
                <th>
                    <a  
                        class="{{ request()->query('sort') == 'paterno' ? 'active' : 'text-dark'  }}"  
                        href="{{ request()->fullUrlWithQuery(['sort' => 'paterno']) }}"
                    >
                        Nombres
                    </a>
                </th>
                <th>
                    <a  class="{{ request()->query('sort') == 'dni' ? 'active' : 'text-dark'  }}"  
                        href="{{ request()->fullUrlWithQuery(['sort' => 'dni']) }}"
                    >
                        DNI
                    </a>
                </th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach( $personas as $persona )
            <tr>
                <td>
                    {{ $loop->iteration + $personas->perPage() * ($personas->currentPage() - 1) }}
                </td>
                <td>{{ $persona->paterno . ' ' . $persona->materno . ' ' . $persona->nombre }}</td>

                <td>
                    <a href="{{ route('personas.show', $persona->id) }}">
                        {{ $persona->dni }}
                    </a>
                </td>

                <td>
                    <a href="#" class="text-primary">Editar</a>
                </td>
                <td>
                    <a href="#" class="text-danger">Editar</a>
                </td>
                
                <td>
                    <a href="{{ route('personas.subirfoto', $persona->id) }}" class="text-success">Foto</a>
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
        $personas->appends( [ 'buscar' => request('buscar'), 'sort'=>request('sort') ] )
                    ->links('pagination::bootstrap-4') 
    !!}
</div>

@endsection


{{-- {!! $personas->appends( [ 'buscar' => request('buscar') ] )->links('pagination::bootstrap-4') !!} --}}
{{-- {!! $personas->appends( request()->query() )->links('pagination::bootstrap-4') !!} --}}