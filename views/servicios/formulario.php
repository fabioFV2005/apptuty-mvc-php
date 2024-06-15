<?php //debuguear($categoria);?>
<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" placeholder="Nombre del producto" id="nombre" name="nombre" value="<?php echo $servicio->nombre; ?>">
</div>

<div class="campo">
    <label for="precio">Precio</label>
    <input type="number" placeholder="Precio del producto" id="precio" name="precio" value="<?php echo $servicio->precio; ?>">
</div>

<div class="campo">
    <label for="categoriaId">Categoría</label>
    <select id="categoriaId" name="categoriaId" class="categoria-select">
        <?php foreach ($categoria as $categorias) { ?>
            <option value="<?php echo $categorias->id;?>"><?php echo $categorias->nombre;?></option>
        <?php } ?>
    </select>
</div>

<div class="campo">
    <label for="imagenProducto">Imagen</label>
    <input type="file" id="imagenProducto" name="imagenProducto" value="<?php echo $servicio->imagenProducto; ?>">
</div>

<?php if(isset($servicio->imagen_actual)){ ?>
    <h2>Imagen Actual:</h2>
    <div class="formulario-imagen">
        <img src="<?php echo $_ENV["HOST"] . '/img/ImagenProductos/' . $servicio->imagenProducto . '.png'; ?>" alt="imagen producto">
    </div>
<?php } ?>
