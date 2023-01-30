<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid !direction !spacing">

        <div class="table-responsive">
            <h1>Notas desde base de datos</h1>
            <table class="table" border="black">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Detalles</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        <tr>
                            <td>{{ $nota->nombre }}</td>
                            <td>{{ $nota->descripcion }}</td>
                            <td><a href={{{'notas/' . $nota->id }}} class="btn btn-success btn-sm"><i class="bi bi-clipboard"></i></a></td>
                            <td><a href="{{ route('notas.editar', $nota) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i> </a></td>
                            <td><form action="{{ route('notas.eliminar', $nota) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i></button>
                                </form></td>
                            {{-- <td><a href="{{ route('notas.eliminar', $nota->id) }}" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> </a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <h1>Crear una nueva nota</h1>
        <form action="{{ route('notas.crear') }}" method="POST">
            @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
            @if (session('mensaje'))
                <div class="alert alert-success" role="alert">
                {{ session('mensaje') }}
                </div>
            @endif
            @error('nombre') 
            <div class="alert alert-danger"> No olvides rellenar el nombre </div>
            @enderror
            <input
                type="text"
                name="nombre"
                value="{{ old('nombre') }}"
                class="form-control mb-2"
                placeholder="Nombre de la nota"
                autofocus >
            <input type="text" name="descripcion" placeholder="Descripción de la nota" class="form-control mb-2">
            
            <button class="btn btn-primary btn-block" type="submit">
            Crear nueva nota
            </button>
            </form>
    </div>
</html>
