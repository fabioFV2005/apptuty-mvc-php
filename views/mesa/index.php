<?php 
    include_once __DIR__ . '/../templates/barra.php'; // Incluir barra de navegación u otros elementos comunes
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f580ad9add.js" crossorigin="anonymous"></script>
</head>

<main class="contenedor sombra">
    <?php include_once __DIR__ . '/../templates/alertas.php'; // Incluir alertas si las hay ?>
    
    <div class="container-fluid row p-3">
        <!-- Formulario para agregar o editar mesa -->
        <form class="formulario col-4" method="POST" action="/mesas">
            <legend>Nueva Mesa</legend>
            <div class="campo">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="desocupado">Desocupado</option>
                    <option value="ocupado">Ocupado</option>
                </select>
            </div>
            <input type="submit" class="boton-enviar" value="Guardar Mesa" name="guardar">
        </form>

        <!-- Tabla de mesas -->
        <div class="col-8 p-4">
    <div class="table-container">
        <table class="table table-hover">
            <thead class="cabezera">
                <tr>
                    <th scope="col">Numero de mesa</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mesas as $mesa) { ?>
                    <tr>
                        <td><?php echo $mesa->id; ?></td>
                        <td><?php echo ucfirst($mesa->estado); ?></td> <!-- Convertir la primera letra a mayúscula -->
                        <td>
                            <a href="/mesas/editar?id=<?php echo $mesa->id; ?>" class="btn btn-small btn-warning"><i class="fas fa-edit"></i>Editar</a>
                            <form method="POST" action="/mesas" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $mesa->id; ?>">
                <button type="submit" class="btn btn-small btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</main>
