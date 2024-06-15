
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Polleria tuty</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
<body>
    <header>
      
        
        <div class="logo-contenedor">
        <h1 class="titulo"><span>Polleria</span> Tuty</h1>
        <img class = "logo"src="/build/img/5ad3b4239f52fb692103935b604d4ee9.png" alt="Logo de la pollería">
    <h2>Cliente: <?php echo $nombre;?>, Bienvenido</h2>
        </div>
      
    </header>
    <div class = "nav-bg"> 
            <nav class = "navegacion-Principal contenedor">
            <a href="/informacion">Home</a>
            <a href="/cita">Haz tu pedido</a>
            <a href="#">Historial de pedidos</a>
            <a href="/">Salir</a>
        </nav>
          
    </div>
    <h2 class="separacion">Estamos ubicados en:</h2>
    <section class="hero">
        <div class="contenido-hero" id="mi_mapa">



        </div>
   
    </section>

    <main class = "contenedor sombra">
        <h2>Nuestros servicios</h2>



        <div class="informaciones">

        <section class="informacion">
            <h3>Servicio de Comida para Llevar</h3>
            <div class="iconos">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paper-bag" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M8 3h8a2 2 0 0 1 2 2v1.82a5 5 0 0 0 .528 2.236l.944 1.888a5 5 0 0 1 .528 2.236v5.82a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-5.82a5 5 0 0 1 .528 -2.236l1.472 -2.944v-3a2 2 0 0 1 2 -2z" />
  <path d="M14 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
  <path d="M6 21a2 2 0 0 0 2 -2v-5.82a5 5 0 0 0 -.528 -2.236l-1.472 -2.944" />
  <path d="M11 7h2" />
</svg>
            </div>
            <p>dolor sit amet consectetur adipisicing elit. Illum debitis quae numquam nesciunt fuga libero accusantium maxime, neque dolores voluptatem et inventore qui quibusdam, itaque asperiores autem repellendus accusamus enim!</p>
        </section>

        <section class="informacion">
            <h3>Servicio de Entrega a Domicilio</h3>
        <div class="iconos">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
  <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
  <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
  <path d="M3 9l4 0" />
</svg>
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-transfer-in" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M4 18v3h16v-14l-8 -4l-8 4v3" />
  <path d="M4 14h9" />
  <path d="M10 11l3 3l-3 3" />
</svg>
            </div>
            <p>dolor sit amet consectetur adipisicing elit. Illum debitis quae numquam nesciunt fuga libero accusantium maxime, neque dolores voluptatem et inventore qui quibusdam, itaque asperiores autem repellendus accusamus enim!</p>
        </section>

        <section class="informacion">
            <h3>Servicio en el Local</h3>
            <div class="iconos">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
</svg>
            </div>
            <p>dolor sit amet consectetur adipisicing elit. Illum debitis quae numquam nesciunt fuga libero accusantium maxime, neque dolores voluptatem et inventore qui quibusdam, itaque asperiores autem repellendus accusamus enim!</p>
        </section>
    </div>
    <section>
        <h2>Buzon de Sugerencias</h2>
        <form class="formulario" method="POST" action="" >
        <legend>Llena los campos para mandar tus sugerencias</legend>
            <?php  include_once __DIR__ . '/../templates/alertas.php';?>
            
           
                
                <input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $id; ?>">
                <div class="contenedor-campos">
                <div class="campo">
                    <label>Nombre</label>
                    <input id="nombre" name="nombre" class = "input-text" type="text" placeholder="Tu Nombre" value ="<?php echo $nombre;?>"  >
                </div>

                <div class="campo">
                    <label>Telefono</label>
                    <input id="telefono" name="telefono" class = "input-text" type="tel" placeholder="Tu Telefono" value ="<?php echo $telefono;?>"   >
                </div >

                <div class="campo">
                    <label>Correo</label>
                    <input id="email" name="email" class = "input-text" type="email" placeholder="Tu email" value="<?php echo $email;?>"  >
                </div>

                <div class="campo">
                    <label>Mensaje</label>
                    <textarea id="mensaje" name="mensaje"class = "input-text"></textarea>
                </div>
            </div>
               
                    <input class = "boton-enviar"type="submit" value="guardar mensaje">
       
            
          
        </form>
    </section>
    </main >








    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        
        let map = L.map('mi_mapa').setView([-17.37108,-66.16412], 18)
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

    L.marker([-17.37108,-66.16412]).addTo(map).bindPopup("polleria tuty");

    </script>