<h1 class="nombre-pagina">Olvide mi password</h1>
<p class="descripcion-pagina">Reestablece tu password, ingresa tu e-mail</p>
<?php
    include_once __DIR__  . "/../templates/alertas.php";
?>
<form class="formulario" action="/olvide" method="POST">
        <div class="campo">
            <label for="email">E-mail</label>
            <input 
                type="email"
                id="email"
                name="email"
                placeholder="Tu E-mail"
            />
        </div>
    <input type="submit" class="boton" value="Enviar Verificacion">
</form>
<div class="acciones">
    <a href="/">Volver/Iniciar sesion</a>
    <a href="/crear-cuenta">Registrate/Crear cuenta</a>
</div>