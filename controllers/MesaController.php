<?php
namespace Controllers;

use Model\Categoria;
use Model\Mesa;
use MVC\Router;
class MesaController{

public static function index(Router $router){
   session_start();
    idAdmin();
    $mesas= Mesa::all();
    $router->render("mesa/index",[
        'nombre'=> $_SESSION['nombre'],
        'mesas' => $mesas
    ]);
    }
    public static function crear(Router $router) {
        session_start();  
        idAdmin();
        $todasLasMesas = Mesa::all();
        $mesa = new Mesa;
        $alertas = [];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mesa->sincronizar($_POST);
            $alertas = $mesa->validar();
    
            if (empty($alertas)) {
                $mesa->guardar();
                header('Location: /mesas');
            }
        }
        
        $router->render('mesas/index', [
            'nombre' => $_SESSION['nombre'],
            'mesa' => $mesa,
            'alertas' => $alertas,
            'mesas' => $todasLasMesas
        ]);
    }
    public static function editar(Router $router){
session_start();
        $alertas = [];
    idAdmin();
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        return;
    }
    
    $mesa = Mesa::find($id);

    if (!$mesa) {
        header('Location: /mesas');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mesa->sincronizar($_POST);
        $alertas = $mesa->validar();

        if (empty($alertas)) {
            $mesa->guardar();
            header('Location: /mesas');
        }
    }

    $router->render('/mesa/editar', [
        'mesa' => $mesa,
        'alertas' => $alertas
    ]);
    }
    public static function eliminar(Router $router){
        session_start();
        idAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $mesa = Mesa::find($id);
            
            if ($mesa) {
                $mesa->eliminar();
                header('Location: /mesas');
            } else {
                // Manejo de error si la mesa no se encuentra
                echo "La mesa no existe o ya ha sido eliminada.";
            }
    }   


    }
}