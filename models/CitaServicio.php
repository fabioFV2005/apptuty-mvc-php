<?php

namespace Model;

class CitaServicio extends ActiveRecord{
    protected static $tabla = "reservaspedidos";
    protected static $columnasDB = ['id','reservaId','productoId'];

    public $id;
    public $reservaId;
    public $productoId;


    public function __construct($args = [])
    {
            $this->id = $args['id']??null;
            $this->reservaId = $args['reservaId']??'';
            $this->productoId = $args['productoId']??'';
    }
}