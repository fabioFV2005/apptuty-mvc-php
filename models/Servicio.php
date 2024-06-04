<?php

namespace Model;
class Servicio extends ActiveRecord{
    //base de datos
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id','nombre','precio'];


    public $id;
    public $nombre;
    public $precio;


    public function __construct($args = []){
        $this->id = $args['id']??null;
        $this->nombre = $args['nombre']??'';
        $this->precio = $args['precio']??'';



    }


    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre del servicio es obligatorio';
        }
        if(!$this->precio){
            self::$alertas['error'][] = 'El precio es obligatorio';
        }
        if(!is_numeric($this->precio)){
            self::$alertas['error'][] = 'EL PRECIO NO ES VALIDO';
        }
        return self::$alertas;
    }
}