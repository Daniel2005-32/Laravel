<form action="/procesar-datos" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="number" name="edad" placeholder="Edad">
    <button type="submit">Enviar</button>
</form><?php /**PATH /var/www/html/cifpzonzamas.lan/resources/views/formulario.blade.php ENDPATH**/ ?>