
<?php
 include_once __DIR__ . '/../templates/barra.php'
?>
<?php 
    include_once __DIR__ . '/../templates/alertas.php';
?>
<h1 class="nombre-pagina">Actualizar Producto</h1>
<p class="descripcion-pagina">Modifica los productos</p>
<form  method="POST" class="formulario" enctype="multipart/form-data">
    <?php include_once __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="boton" value = "Editar producto">
</form>
