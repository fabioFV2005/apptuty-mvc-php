<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f580ad9add.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="custom-bar">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>
    </div>
    <main class="contenedor sombra">
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        <div class="container-fluid row p-3">
            <form  method="POST" class="formulario col-4" enctype="multipart/form-data">
                <legend>Registrar Un Nuevo Producto</legend>
                <?php include_once __DIR__ . '/formulario.php'; ?>
                <input type="submit" class="boton-enviar" value="Guardar Producto">
            </form>

            <div class="col-8 p-4">
                <table class="table table-hover">
                    <thead class="cabezera">
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($servicios as $servicio) { ?>
                        <tr>
                            <td><?php echo $servicio->nombre; ?></td>
                            <td><?php echo $servicio->precio; ?> Bs.</td>
                            <td>
                                <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/servicios/eliminar" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
