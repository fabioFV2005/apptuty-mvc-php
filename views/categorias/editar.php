<?php  include_once __DIR__ . '/../templates/barra.php';?>
<header>

<main class="contenedor sombra">
    
<?php 
    include_once __DIR__ . '/../templates/alertas.php';
?>
<div class="container-fluid row p-3">
    <form class="formulario col-4" method="POST"  >
        <legend>Editar Categorias</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre De la Categoria" id="nombre" name="nombre" value="<?php echo $categoria->nombre; ?>">
            </div>
            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <input type="text" placeholder="Descripcion De la Categoria" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion; ?>">
            </div>
            <input type="submit" class="boton-enviar" value = "editar categoria" >
    </form>
</main>