<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categoria;

class ServicioController {
    public static function index(Router $router) {
        session_start();
        idAdmin();
       // $categoria = 'SELECT * FROM categorias';
       $categoria = Categoria::all();
        $servicio = Servicio::all();


       $router->render('servicios/index',[
        'nombre'=> $_SESSION['nombre'],
        'servicios'=> $servicio,
        'categoria' => $categoria
       ]);

       
    }
    public static function crear(Router $router) {
      
        session_start();
        idAdmin();
        $todo = Servicio::all();
$categoria = Categoria::all();  
        $servicio = new Servicio;
        $alertas =[];
     
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
            //leer imagen
            if(!empty($_FILES['imagenProducto']['tmp_name'])){
               $carpeta_imagenes = '../public/img/ImagenProductos';
               if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes,0777, true);
               }
              $imagen_png = Image::Make($_FILES['imagenProducto']['tmp_name'])->fit(800,800)->encode('png',80);
             

              $nombre_imagen = md5(uniqid(rand(), true));

              $_POST['imagenProducto'] = $nombre_imagen;

            }


      
            $servicio->sincronizar($_POST);
          
        
        
            $alertas = $servicio->validar();   


             if(empty($alertas)){ 
                //guardar las imagenes

                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
               
               $resultado = $servicio->guardar();
               if($resultado){
                header('Location: /servicios');
               }
               
             }

        }
     
        $router->render('servicios/index',[
            'nombre'=> $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas,
            'categoria' => $categoria,
            'servicios' => $todo
           ]);
        
           
    }

    public static function actualizar(Router $router) {
        $alertas = [];
        session_start();
        idAdmin();
        $categoria = Categoria::all();
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if (!$id) {
            return;
        }
        
        $servicio = Servicio::find($_GET['id']);
        
        if (!$servicio) {
            header('Location: /servicios');
            exit; // Asegúrate de salir después de redirigir
        }
        
        $servicio->imagen_actual = $servicio->imagenProducto;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['imagenProducto']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/ImagenProductos';
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0777, true);
                }
        
                // Genera un nombre único para la imagen sin duplicar la extensión
                $nombre_imagen = md5(uniqid(rand(), true)) . '.png';
                $imagen_png = Image::Make($_FILES['imagenProducto']['tmp_name'])->fit(800, 800)->encode('png', 80);
        
                $_POST['imagenProducto'] = $nombre_imagen;
            } else {
                $_POST['imagenProducto'] = $servicio->imagen_actual;
            }
        
            $servicio->sincronizar($_POST);
        
            $alertas = $servicio->validar();
            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                }
                $servicio->guardar();
            }
        }
        
        $router->render('/servicios/actualizar', [
             'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas,
            'categoria' => $categoria 
        ]);
    }
      public static function eliminar() {
        session_start();
        idAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header('Location: /servicios');
        }
    }
}