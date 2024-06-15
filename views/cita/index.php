<?php //debuguear($categorias); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Polleria tuty</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
    <h1 class="titulo"><span>Polleria</span> Tuty</h1>
        
       
    
    </header>
    <div class="logo-contenedor">
       
       <img class = "logo"src="/build/img/5ad3b4239f52fb692103935b604d4ee9.png" alt="Logo de la pollería">
     
           </div>
    <h2>Cliente: <?php echo $nombre;?>, Bienvenido</h2>
    <div class = "nav-bg"> 
            <nav class = "navegacion-Principal contenedor">
            <a href="/informacion">Home</a>
            <a href="/cita">Haz tu pedido</a>
            <a href="#">Historial de pedidos</a>
            <a href="/">Salir</a>
        </nav>
</div>
<main class = "contenedor sombra">
    <h2 class="pedido-texto">Haz tu pedido</h2>
  
    <div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Productos</button>
        <button type="button" data-paso="2">Información para tu pedido</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion" >
        <h2>Productos</h2>
        <p class="text-center">Elige tus Productos a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>

    <div id="paso-2" class="seccion">
        <h2>Tus Datos</h2>

        <form class="formulario">
            <legend>Elige fecha y hora</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                    id="nombre"
                    type="text"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input
                    id="fecha"
                    type="date"
                    min="<?php echo date('Y-m-d', strtotime('-1 day') ); ?>"
                />
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input
                    id="hora"
                    type="time"
                />
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>" >

        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button 
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button 
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

</main>



<?php 
    $script = "
         <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>