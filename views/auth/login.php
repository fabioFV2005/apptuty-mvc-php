<main class = "contenedor sombra">
<h1 class ="nombre-pagina">Inicia Sesión</h1>
<div class="logo-contenedor">

<img class = "logo"src="/build/img/logo-polleria.jpg" alt="Logo de la pollería">
                
</div>

<?php
    include_once __DIR__  . "/../templates/alertas.php";
?>





<form class="formulario" method="POST" action="/">
<legend>Inicia Sesion con tus credenciales</legend>
    <div class="campo">
        <label for="email">Email</label>
        <input
        class="input-text"
            type="email"
            id = "email"
            placeholder="Tu Email"
            name = "email"
            value="<?php echo s($auth->email);?>"
        />
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input
        class="input-text"
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
        />
    </div>
    <div class="centrar-boton"><input type="submit" class="boton-enviar" value="Iniciar Sesion"></div>
    

</form>
<div class="acciones">
    <a href="/crear-cuenta">Registrate/Crear cuenta</a>
    <a href="/olvide">Olvide mi password</a>
</div>
</main >