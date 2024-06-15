<?php  include_once __DIR__ . '/../templates/barra.php';?>
 
 <main class = "contenedor sombra">
<h2 >BUSCAR RESERVAS</h2>
<div class="busqueda">
    <form class="formulario">
        <legend>Ingresa la fecha que deseas buscar </legend>
            <div class="campo">
                    <label for="fecha">Fecha</label>
                    <input type="date"
                            id = "fecha"
                            name="fecha"
                            value="<?php echo $fecha;?>"
                    />
            </div>
    </form>
</div>

<?php 
        if(count($reservas) === 0){ 
                echo "<h2>NO HAY RESERVAS EN ESTA FECHA</h2>";
         } 
         ?> 

<div class="citas-admin">
        <ul class="citas">
                <?php 
                $idReserva=0;
                        foreach($reservas as $key => $reserva){
                             //debuguear($key);
                                if($idReserva !== $reserva->id){
                                        $total = 0;
                                      
                ?>     
                 <br>
                                        <h3>Cliente:</h3>
                 <p>ID del pedido: <span> <?php echo $reserva->id;?></span></p>
                        <p>HORA: <span> <?php echo $reserva->hora;?></span></p>
                        <p>CLIENTE: <span> <?php echo $reserva->cliente;?></span></p>
                        <p>EMAIL: <span> <?php echo $reserva->email;?></span></p>
                        <p>TELEFONO: <span> <?php echo $reserva->telefono;?></span></p>
                                        <h3>Productos del pedido:</h3>
                        <?php  
                         $idReserva = $reserva->id;
                } //fin de if
                        $total +=$reserva->precio;
                ?> 
                        <p class = "servicio"> <?php echo $reserva->producto . " " . $reserva->precio; ?></p>
                      
                        <?php
                        $actual = $reserva->id;
                        $proximo = $reservas[$key + 1]-> id ?? 0;
                        if(esUltimo($actual,$proximo)){ ?>
                             <p class="total">TOTAL: <span><?php echo $total ?> Bs.</span> </p>
                     
                             <form action='/api/eliminar' method="POST">
                                        <input type="hidden" name="id" value = "<?php echo $reserva->id;?>">
                                        <button class="button" type="submit" value="Eliminar">
                                        <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                                        </button>
                      <!--   <input type="submit" class="boton-eliminar" value="Eliminar">-->
                                </form>
                                <hr>
                             <?php    }
                        ?>

                        <?php } //fin foreach ?> 
        </ul>

       
</div>

</main>
<?php 
 $script = "<script src='build/js/buscador.js'></script>";
?>
