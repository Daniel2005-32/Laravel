<form action="/libro" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="titulo" placeholder="Titulo">
    <input type="text" name="autor" placeholder="Autor">
    <input type="number" name="anho" placeholder="Año de publicacion">
    <label>Genero</label>
    <select name="genero">
        <option value="ciencia">Ciencia Ficcion</option>
        <option value="accion">Accion</option>
        <option value="romance">Romance</option>
        <option value="deporte">Deporte<option>
    </select>
    <label>Descripcion</label>
    <textarea name="descripcion"></textarea>
    <button type="submit">Enviar</button>
</form>
