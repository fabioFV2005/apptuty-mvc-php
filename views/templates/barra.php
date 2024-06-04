<div class="barra">
    <p>Hola: <?php echo $nombre ?? '';?></p>

    <a class = "boton" href="/logout">Cerrar Sesion</a>
</div>


<?php 
    if(isset($_SESSION['_admin'])){ ?>
      <div class="barra-servicios">
        <a class="boton" href="/admin">Ver Citas</a>
        <a class="boton" href="/servicios">Ver Productos</a>
        <a class="boton" href="/servicios/crear">Registrar Producto</a>

      </div>
   <?php } ?>