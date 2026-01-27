<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Mismo navbar que en las otras vistas -->
    </nav>

    <div class="container pt-4">
        <div class="card">
            <div class="card-header">
                <h3>Detalles del Libro</h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $libro->titulo }}</h5>
                <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p class="card-text"><strong>Año:</strong> {{ $libro->anho }}</p>
                <p class="card-text"><strong>Género:</strong> 
                    @if($libro->genero == 'NV') Novela @elseif($libro->genero == 'SP') Suspense @else {{ $libro->genero }} @endif
                </p>
                <p class="card-text"><strong>Descripción:</strong><br>{{ $libro->descripcion }}</p>
                
                <div class="mt-3">
                    <a href="{{ route('libro.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('libro.destroy', $libro->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                    <a href="{{ route('libro.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>