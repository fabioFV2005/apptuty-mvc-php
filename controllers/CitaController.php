<?php

namespace Controllers;
use Model\Usuario;
use Controllers\LoginController;
use MVC\Router;

class CitaController {
    public static function index( Router $router ) {

        session_start();

        //debuguear($_SESSION);
//encotre un error xDD no se donde mierda pero le pase nopmbre XDDD
        isAuth();   
        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']]);
        }
}