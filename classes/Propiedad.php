<?php

namespace App;

class Propiedad
{

    //BASE DE DATOS

    protected static $db;

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    //Definir la conexion a la BD

    public static function setDB($database){
        self::$db;
    }
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function guardar(){

        //SANITIZAR LOS DATOS 

        public function sanitizar






           //INSERTAR EN LA BASE DE DATOS 

    $query = "INSERT INTO propiedades (titulo, precio,imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)VALUES(
       '$this ->titulo', '$this->precio','$this-> nombreImagen', '$this->descripcion','$this->habitaciones','$this->wc','$this->estacionamiento','$this->creado','$this->vendedorId')";

       $resultado= self::$db->quiery($query);

       debuguear($resultado);
    }



}