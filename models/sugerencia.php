<?php 
namespace Model;

class Sugerencia extends ActiveRecord{
    //base de datos uwu
    protected static $tabla = "sugerencias";
    protected static $columnasDB= ['id','usuarioId','nombre','telefono','email','mensaje'];

    public $id;
    public $usuarioId;
    public $nombre;

    public $telefono;

    public $email;

    public $mensaje;
    public function __construct($args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->nombre = $args['nombre'] ??'';
        $this->telefono = $args['telefono'] ??'';
        $this->email = $args['email'] ??'';
        $this->mensaje = $args['mensaje'] ??'';
    }
    public function validar(){
    
        if(!$this->mensaje){
            self::$alertas['error'][] = 'El mensaje es obligatorio';
        }
        return self::$alertas;
    }

}