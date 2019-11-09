<!DOCTYPE html>
<html lang="en">
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
            <h3>Personas</h3>
        </div>
    </div>
    <div class="row">
    
        <div class="col">

            <div class="row">
                <div class="col text-right">
                    <a href="/personas/create" class="btn btn-outline-success">Crear</a>
                </div>
            </div>

            <div class="table-responsive">

                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombres</th>
                            <th>DNI</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach( $personas as $persona )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $persona->paterno . ' ' . $persona->materno . ' ' . $persona->nombre }}</td>
                            <td>{{ $persona->dni }}</td>
                            <td>{{ $persona->correo }}</td>
                            <td>{{ $persona->celular }}</td>
                            <td>Editar</td>
                            <td>Eliminar</td>
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