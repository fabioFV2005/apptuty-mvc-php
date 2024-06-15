<?php
namespace Model;
class Mesa extends ActiveRecord{
    protected static $tabla = "mesas";
    protected static $columnasDB = ['id','estado'];


    public $id;
    public $estado;

    public function __construct(  $args =[])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
    }

}