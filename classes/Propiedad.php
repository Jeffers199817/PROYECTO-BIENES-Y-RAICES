<?php

namespace App;

class Propiedad
{
    // BASE DE DATOS

    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // ERRORES
    protected static $errores = [];

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

    // Definir la conexion a la BD

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? 1;
    }

    public function guardar()
    {
        // Condición para crear un nuevo objeto
        if (isset($this->id) && $this->id != '') {
            // actualizar
            $this->actualizar();
        } else {
            // creando un nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {
        // SANITIZAR LOS DATOS

        $atributos = $this->sanitizarAtributos();

        /* $string = join(',', array_keys($atributos));
        $string = join(',', array_values($atributos)); */

        // INSERTAR EN LA BASE DE DATOS

        $query = ' INSERT INTO propiedades ( ';
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if ($resultado)
            // redireccionar al usuario6
            header('Location: /admin?resultado=1');
    }

    public function actualizar()
    {
        // Sanitizar los datos

        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = 'UPDATE propiedades SET ';
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= ' LIMIT 1 ';

        $resultado = self::$db->query($query);

        if ($resultado) {
            // redireccionar al usuario6
            header('Location: /admin?resultado=2');
        }
    }

    // Identificar y unir los atributos de la    BD
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id')
                continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // SUBIDA DE ARCHIVOS IMAGEN

    public function setImagen($imagen)
    {
        // Elimina la imagen previa
        if (isset($this->id)) {
            // Comprobar si existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // VALIDACIÓN

    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = 'Debes añadir un titulo';
        }
        if (!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if (!$this->habitaciones) {
            self::$errores[] = 'El número de habitaciones es obligatoria';
        }
        if (!$this->wc) {
            self::$errores[] = 'El número de baños es obligatoria';
        }
        if (!$this->estacionamiento) {
            self::$errores[] = 'El número de estacionamientos es obligatorio';
        }
        if (!$this->vendedorId) {
            self::$errores[] = 'Elige un vendedor';
        }

        if (!$this->imagen) {
            self::$errores[] = 'La imagen es Obligatoria';
        }

        return self::$errores;
    }

    // Lista todas las propiedades

    public static function all()
    {
        $query = 'SELECT*FROM propiedades';
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Buscar un registro por su ID
    public static function find($id)
    {
        $query = "SELECT*FROM propiedades WHERE id = $id";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // CONSULTAR LA BASE DE DATOS
        $resultado = self::$db->query($query);

        // ITERAR LOS RESULTADOS
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }
        // LIBERAR LA MEMORIA

        $resultado->free();

        // RETORNAR LOS RESULTADOS

        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // sincroniza el objeto en memoria con los cambios realizados por el usuario

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
