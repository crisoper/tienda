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
            <h3>Agregar Persona</h3>
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm-12">

            <form action="/personas" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control">
                        <div class="text-danger">{{ $errors->first('dni') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="paterno">Apellido paterno</label>
                        <input type="text" id="paterno" name="paterno" class="form-control">
                        <div class="text-danger">{{ $errors->first('paterno') }}</div>
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="materno">Apellido materno</label>
                        <input type="text" id="materno" name="materno" class="form-control">
                        <div class="text-danger">{{ $errors->first('materno') }}</div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control">
                        <div class="text-danger">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="correo">Correo</label>
                        <input type="text" id="correo" name="correo" class="form-control">
                        <div class="text-danger">{{ $errors->first('correo') }}</div>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" id="direccion" name="direccion" class="form-control">
                        <div class="text-danger">{{ $errors->first('direccion') }}</div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="celular">Celular</label>
                        <input type="text" id="celular" name="celular" class="form-control">
                        <div class="text-danger">{{ $errors->first('celular') }}</div>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="fechanacimiento">Fechanacimiento</label>
                        <input type="date" id="fechanacimiento" name="fechanacimiento" class="form-control">
                        <div class="text-danger">{{ $errors->first('fechanacimiento') }}</div>
                    </div>

                    <div class="form-group col-md-4">
                        Sexo    <br>
                        <br>
                        <label>
                            <input type="radio" name="sexo" value="M"> Masculino
                        </label>
                        <label>
                            <input type="radio" name="sexo" value="F"> Femenino
                        </label>

                        <div class="text-danger">{{ $errors->first('sexo') }}</div>
                    </div>
                </div>
                

                {!! csrf_field() !!}


                <button type="submit" class="btn btn-info">Guardar</button>
                
                {{-- @if ($errors->any())
                    <br>
                    @foreach( $errors->all() as $error )
                        <span class="text-danger">{{ $error }}</span><br>
                    @endforeach
                    <br>
                @endif --}}

            
            </form>
            
        </div>
    </div>

</div>
    
</body>
</html>