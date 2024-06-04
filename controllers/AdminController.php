<?php
namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController{
    public static function index(Router $router){
        
        session_start();
        idAdmin();





        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);
        if( !checkdate($fechas[1], $fechas[2], $fechas[0])){
            header('Location: /404');
        }
     //   debuguear($fecha);
       
        //consultar la DB
                    $consulta = "SELECT reservas.id, reservas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
                    $consulta .= " usuarios.email, usuarios.telefono, productos.nombre as producto, productos.precio  ";
                    $consulta .= " FROM reservas  ";
                    $consulta .= " LEFT OUTER JOIN usuarios ";
                    $consulta .= " ON reservas.usuarioId=usuarios.id  ";
                    $consulta .= " LEFT OUTER JOIN reservaspedidos ";
                    $consulta .= " ON reservaspedidos.reservaId=reservas.id ";
                    $consulta .= " LEFT OUTER JOIN productos ";
                    $consulta .= " ON productos.id=reservaspedidos.productoId ";
                   $consulta .= " WHERE fecha =  '$fecha' ";
         //debuguear($consulta);
                    $cita = AdminCita::SQL($consulta);
        
                    //debuguear($cita);
        $router->render('admin/index',[
            'nombre'=> $_SESSION['nombre'],
            'reservas' => $cita,
            'fecha' => $fecha
        ] );
    }
}