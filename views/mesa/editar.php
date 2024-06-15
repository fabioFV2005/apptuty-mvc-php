<?php 
    include_once __DIR__ . '/../templates/barra.php'; // Incluir barra de navegación u otros elementos comunes
?>
<main class="contenedor sombra">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <div class="container-fluid row p-3">
        <form class="formulario col-4" method="POST">
            <legend>Editar Mesa</legend>
            <div class="campo">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="desocupado" <?php echo ($mesa->estado === 'desocupado') ? 'selected' : ''; ?>>Desocupado</option>
                    <option value="ocupado" <?php echo ($mesa->estado === 'ocupado') ? 'selected' : ''; ?>>Ocupado</option>
                </select>
            </div>
            <input type="submit" class="boton-enviar" value="Editar Mesa" >
        </form>
    </div>
</main>