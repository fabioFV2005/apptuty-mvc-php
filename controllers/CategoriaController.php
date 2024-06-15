<?php
namespace Controllers;
use Model\Categoria;
use MVC\Router;


class CategoriaController{


    public static function index(Router $router){
        session_start();    
        idAdmin();
       // debuguear($_SESSION);
       //$categorias = new Categoria;
       //$alertas = [];

       $consulta = 'select * from categorias';
      $categoria = Categoria::SQL($consulta);
     
       // $alertas = [];
      //$alertas = $categorias->validar();

        $router->render('categorias/index',[
          
            'nombre' => $_SESSION['nombre'],
           'categorias' => $categoria,
        //   'alertas'=> $alertas
        ]);



    }

    public static function crear(Router $router){
        session_start();  
        idAdmin();
        $todo = Categoria::all();
        $categoria = new Categoria;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $categoria->sincronizar($_POST);
            $alertas = $categoria->validar();

            if(empty($alertas)){
                 $categoria->guardar();
                 header('Location: /categorias');
            }
        }
        
        $router->render('categorias/index',[
          
            'nombre' => $_SESSION['nombre'],
           'categoria' => $categoria,
           'alertas' => $alertas,
           'categorias' => $todo
        ]);
    }
    public static function editar(Router $router){
        $alertas = [];
        // session_start();
        idAdmin();
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if (!$id) {
            return;
        }
        $categoria = Categoria::find($_GET['id']);
       //debuguear($categoria);  
        if (!$categoria) {
            header('Location: /categorias');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $categoria->sincronizar($_POST);
            $alertas = $categoria->validar();

            if(empty($alertas)){
                 $categoria->guardar();
                 header('Location: /categorias');
                 
            }
        }
        $router->render('/categorias/editar',[
          
            //'nombre' => $_SESSION['nombre'],
           'categoria' => $categoria,
           'alertas' => $alertas
        ]);
        

    }


    public static function eliminar(Router $router){
        session_start();
        idAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $categoria = Categoria::find($id);
            $categoria->eliminar();
            header('Location: /categorias');
        }
    }


}