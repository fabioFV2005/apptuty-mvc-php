<main class = "contenedor sombra">
<h1 class="nombre-pagina">Olvide mi password</h1>
<div class="logo-contenedor">

<img class = "logo"src="/build/img/logo-polleria.jpg" alt="Logo de la pollería">
                
</div>
<?php
    include_once __DIR__  . "/../templates/alertas.php";
?>
<form class="formulario" action="/olvide" method="POST">
    <legend>Reestablece tu password, ingresa tu e-mail</legend>
        <div class="campo">
            <label for="email">E-mail</label>
            <input 
                type="email"
                id="email"
                name="email"
                placeholder="Tu E-mail"
            />
        </div>
        <div class="centrar-boton"><input type="submit" class="boton-enviar" value="Enviar verificacion"></div>
</form>
<div class="acciones">
    <a href="/">Volver/Iniciar sesion</a>
    <a href="/crear-cuenta">Registrate/Crear cuenta</a>
</div>
</main>