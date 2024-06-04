<?php 
namespace Controllers;

use Model\Cita;
use Model\Servicio;
use Model\CitaServicio;

class APIController{
    public static function index(){
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }
    public static function guardar(){
        //almacena la cita y devuelve el id
      $cita = new Cita($_POST);
      $resultado = $cita->guardar();
        
      $id = $resultado['id'];
        //almacena la cita y el servicio
        //almacena los servicios con el id de la cita

        $idServicios = explode(",", $_POST["servicios"]);

        foreach($idServicios as $idServicio){
            $args = [
                "reservaId"=> $id,
                'productoId'=> $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $cita = Cita::find($id);

        $cita->eliminar();

        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
    }
}