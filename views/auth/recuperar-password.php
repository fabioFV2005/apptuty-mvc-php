<h1 class = "nombre-pagina">Recuperar password</h1>
<p class="descripcion-pagina">coloca tu nuevo password a continuacion: </p>
<?php
    include_once __DIR__  . "/../templates/alertas.php";
?>
<?php if($error) return;?>
<form  class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input type="password"
                id= "password"
                name = "password"
                placeholder= "tu nuevo password";
        >
    </div>  
    <input type="submit" class="boton" value="Guardar nuevo password">

</form>
<div class="acciones">
    <a href="/">Volver/Iniciar sesion</a>
    <a href="/crear-cuenta">Registrate/Crear cuenta</a>
</div>