<?php

namespace Controllers;
use Model\Usuario;
use Controllers\LoginController;
use Model\Sugerencia;
use MVC\Router;

class InformacionController {
   
    public static function index( Router $router ) {
        session_start();
        isAuth();   
      //debuguear($_SESSION);
        $router->render('informacion/index', [
            'id' => $_SESSION['id'],
            'nombre' => $_SESSION['nombre'],
            'email' => $_SESSION['email'],
            'telefono' => $_SESSION['telefono'],
        ]);
        
    }

    public static function crear( Router $router ) {
        session_start();  
        $sugerencia = new Sugerencia();
     
        $alertas =[];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $sugerencia->sincronizar($_POST);
            $alertas = $sugerencia->validar();
          //  debuguear($sugerencia);
            if(empty($alertas)){
                $sugerencia->guardar();
              
                header('Location: /informacion');
               
           }
        }
        $router->render('informacion/index', [
            'sugerencia' => $sugerencia,
            'alertas'=> $alertas
        ]);

    }
}