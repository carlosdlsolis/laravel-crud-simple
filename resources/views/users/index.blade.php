<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">

                <!-- creaacion de Formulario Nombre -->
                <div class="card border-0 mb-4 shadow">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert-danger">
                                @foreach($errors->all() as $error)
                                - {{$error}} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store')}}" method="POST">
                            <div class="row my-4">
                                <div class="col">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" 
                                    value="{{ old('name')}}">

                                </div>

                                <div class="col">
                                    <input type="text" name="email" class="form-control" placeholder="Email" 
                                    value="{{ old('email')}}">
                                </div>

                                <div class="col">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="col">
                                    @csrf
                                    <button typr="submit" class="btn btn-primary"> Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Cierras Card -->


                <!-- creacion de Tabla -->
                <table class="table">
                    <thead>
                        <tr>
                            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <form action="{{route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <!-- Creacion de boton 
                                    *Para agregarle in icono al boton se le agrega una etiqueta i -->

                                    <button type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿ Desea eliminar...?')"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>