<?php
namespace Model;

class AdminCita extends ActiveRecord{
    protected static $tabla = "reservaspedidos";
    protected static $columnasDB = ['id','hora','cliente','email','telefono','producto','precio' ];
    public $id;
    public $hora;
    public $cliente;
    public $email;
    public $telefono;
    public $producto;
    public $precio;
   
    public function __construct($args = [])
    {
        $this->id = $args['id']??null;
        $this->hora = $args['hora']??'';
        $this->cliente = $args['cliente']??'';
        $this->email = $args['email']??'';
        $this->telefono = $args['telefono']??'';
        $this->producto = $args['producto']??'';
        $this->precio = $args['precio']??'';

    }
}