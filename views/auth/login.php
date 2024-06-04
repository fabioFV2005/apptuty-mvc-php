<h1 class ="nombre-pagina">login</h1>

<p class="descripcion-pagina">Inicia sesion con tus datos</p>

<?php
    include_once __DIR__  . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input
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
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">

</form>
<div class="acciones">
    <a href="/crear-cuenta">Registrate/Crear cuenta</a>
    <a href="/olvide">Olvide mi password</a>
</div>