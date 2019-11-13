<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col">
            <h3>Agregar Productos</h3>
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm-12">

            <form action="{{ route('productos.store') }}" method="POST">

                {!! csrf_field() !!}

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <select class="form-control mb-1" name="categoria_id" id="categoria_id" autofocus>
                            <option value="">Seleccionar</option>
                            
                            @if ($categorias && count($categorias) >= 1)
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                        <div class="text-danger">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="precio">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control">
                        <div class="text-danger">{{ $errors->first('precio') }}</div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
                        <div class="text-danger">{{ $errors->first('descripcion') }}</div>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Guardar</button>
            </form>
            
        </div>
    </div>

</div>
    
</body>
</html>