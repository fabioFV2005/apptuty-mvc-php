<?php 
namespace Model;
class Categoria extends ActiveRecord{
    protected static $tabla = "categorias";
    protected static $columnasDB = ['id','nombre', 'descripcion'];

    public $id;
    public $nombre;

    public $descripcion;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ??'';
    }
    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre de la categoria es obligatorio';
        }
        if(!$this->descripcion){
            self::$alertas['error'][] = 'La descripcion es obligatoria';
        }
        return self::$alertas;
    }
}