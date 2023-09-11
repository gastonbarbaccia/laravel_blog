<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dashboard_usuarios as $usuario )

                <tr>
                    <th scope="row">{{ $usuario->id }}</th>
                    <td>{{ $usuario->First }}</td>
                    <td>{{ $usuario->Last }}</td>
                    <td>{{ $usuario->Handle }}</td>
                    <td>
                        <a href="javascript:document.getElementById('delete-{{ $usuario->id }}').submit()">Delete</a>
                        <form id='delete-{{ $usuario->id }}' action="{{ route('delete.user', $usuario->id) }}" method="POST">
                          @method('delete')
                          @csrf
                        </form>

                        <a href="{{ route('edit.user',$usuario->id) }}">Edit</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>


    <div class="container">
        <form method="POST" action="{{ route('save.user') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="first"></label>
                <input type="text" class="form-control" id="first" name="first" placeholder="Ingrese nombre">
            </div>
            @error('first')
            <div class="alert alert-danger" role="alert">
               Por favor verifique que el campo este completo 1!
             </div>
           @enderror
            <div class="form-group">
                <label for="last"></label>
                <input type="text" class="form-control" id="last" name="last" placeholder="Ingrese apellido">
            </div>
           @error('last')
            <div class="alert alert-danger" role="alert">
               Por favor verifique que el campo este completo 2!
             </div>
           @enderror
            <div class="form-group">
                <label for="handle"></label>
                <input type="text" class="form-control" id="handle" name="handle" placeholder="Ingrese nickname">
            </div>
            @error('handle')
            <div class="alert alert-danger" role="alert">
               Por favor verifique que el campo este completo 3!
             </div>
           @enderror
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
