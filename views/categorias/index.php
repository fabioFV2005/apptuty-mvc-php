
<?php 
    //debuguear($categorias);
include_once __DIR__ . '/../templates/barra.php';?>

<?php // debuguear($categoria)?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f580ad9add.js" crossorigin="anonymous"></script>
</head>

<main class="contenedor sombra">
<?php 
    include_once __DIR__ . '/../templates/alertas.php';
?>
<div class="container-fluid row p-3">
    <form class="formulario col-4" method="POST">
        <legend>Registro de Categorias</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Nombre De la Categoria" id="nombre" name="nombre" >
            </div>
            <div class="campo">
                <label for="descripcion">Descripcion</label>
                <input type="text" placeholder="Descripcion De la Categoria" id="descripcion" name="descripcion" >
            </div>
            <input type="submit" class="boton-enviar" value = "guardar categoria">
    </form>

    <div class="col-8 p-4">
     <table class="table table-hover">
                    <thead class="cabezera" >
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre De La Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categorias as $datos) { ?>
                <tr>
                    <td><?php echo $datos->id ; ?></td>
                    <td><?php echo $datos->nombre ; ?></td>
                    <td><?php echo $datos->descripcion ; ?></td>
                    <td>
                        <a href="/categorias/editar?id=<?php echo $datos->id ?? '';?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/categorias/eliminar" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $datos->id; ?>">
                                    <button type="submit" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                    </td>
                </tr>
            <?php } ?>
               
                </tbody>
        </table>
</div>

</div>
</main>