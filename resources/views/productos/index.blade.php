<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col">
            <h3>Productos</h3>
        </div>
    </div>
    <div class="row">
    
        <div class="col">

            @if( session()->has('info'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>    
                    </div>    
                </div>
            @endif

            <div class="row mt-3 mb-3">

                <div class="col-xs-12 col-md-6">
                    <form id="form-buscar-persona" class=" " action=" ">
                      <div class="input-group input-group-built-in">
                        <input type="text" class="form-control" placeholder="Buscar" placeholder="Buscar" autofocus name="buscar" value="{{request()->query('buscar')}}">

                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-outline-info">Buscar</button>
                        </span>
                      </div>
                    </form>    
                </div>

                <div class="col-md-6 text-right">
                    <a href="/productos/create" class="btn btn-outline-success">Crear</a>
                </div>
            </div>

            <div class="table-responsive">

                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach( $productos as $pproducto )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pproducto->categoria->nombre }}</td>
                            <td>{{ $pproducto->nombre }}</td>
                            <td>{{ $pproducto->precio }}</td>
                            
                            <td>
                                <a class="text-info" href="{{ route('productos.edit', $pproducto->id ) }}" title="Editar">
                                    Editar
                                </a>
                            </td>

                            <td>
                                <form id="productos.eliminar.{{$pproducto->id}}" action="{{ route('productos.destroy', $pproducto->id) }}" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}
                                <a class="text-danger" href="#" onclick="event.preventDefault(); document.getElementById('productos.eliminar.{{$pproducto->id}}').submit();">Eliminar<a/>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>


        </div>
    </div>

</div>
    
</body>
</html>