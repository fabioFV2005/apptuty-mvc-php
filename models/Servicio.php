<?php

namespace Model;
class Servicio extends ActiveRecord{
    //base de datos
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id','nombre','precio','imagenProducto', 'categoriaId'];


    public $id;
    public $nombre;
    public $precio;

    public $imagenProducto;

    public $categoriaId;
    public function __construct($args = []){
        $this->id = $args['id']??null;
        $this->nombre = $args['nombre']??'';
        $this->precio = $args['precio']??'';
        $this->imagenProducto = $args['imagenProducto'] ?? '';
        $this->categoriaId = $args['categoriaId']?? '';

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
        if(!$this->imagenProducto){
            self::$alertas['error'][] = 'El producto debe tener imagen';
        }
        if(!$this->categoriaId){
            self::$alertas['error'][] = 'El producto debe tener Categoria';
        }
        return self::$alertas;
    }
}