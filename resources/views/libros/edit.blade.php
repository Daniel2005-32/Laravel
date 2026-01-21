<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Mismo navbar que en las otras vistas -->
    </nav>

    <div class="container pt-4">
        <h2>Editar Libro</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('libro.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Año publicación</label>
                <select class="form-select" name="anho" required>
                    <option value="2024" {{ $libro->anho == 2024 ? 'selected' : '' }}>2024</option>
                    <option value="2025" {{ $libro->anho == 2025 ? 'selected' : '' }}>2025</option>
                    <option value="2026" {{ $libro->anho == 2026 ? 'selected' : '' }}>2026</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-select" name="genero" required>
                    <option value="NV" {{ $libro->genero == 'NV' ? 'selected' : '' }}>Novela</option>
                    <option value="SP" {{ $libro->genero == 'SP' ? 'selected' : '' }}>Suspense</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3" required>{{ old('descripcion', $libro->descripcion) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('libro.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>