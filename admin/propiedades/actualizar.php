

<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

estaAutenticado();

// validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// obtener los datos de la propiedad

$propiedad = Propiedad::find($id);

// CONSULTAR PARA OBTENER LOS VENDEDORES

$consulta = 'SELECT*FROM vendedores';

$resultado = mysqli_query($db, $consulta);

// ARREGLO CON MENSAJES DE ERRORES

$errores = Propiedad::getErrores();

// EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ASIGNAR LOS ATRIBUTOS
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    $errores = $propiedad->validar();

    // subida de archivos
    // generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }



    // ESTE CONDICIÓN TIENE QUE DARSE SOLO SI EL ARREGLO ESTÁ VACIO CASO CONTRARIO NO.

    if (empty($errores)) {
         $propiedad->guardar();
        // Almacenar la imagen
        $image->save(CARPETA_IMAGENES. $nombreImagen);
       

        // PARA ENVIAR A LA BASE DE DATOS
    }
}
incluirTemplate('header');

?>

    <main class="contenedor">
        <h1>Actualizar</h1>
            <a href = "/admin" class="boton boton-verde"> Volver</a>
            
            <?php foreach ($errores as $error): ?>
                <div class="alerta error">
                <?php echo $error; ?>
                </div>
            <?php endforeach; ?> 

            <form class="formulario"  method="POST"  enctype="multipart/form-data">
                
                 <?php include '../../includes/templates/formulario_propiedades.php'; ?>

                <input type="submit" value="Actualizar Propiedad" class="boton boton-verde"> 

            </form>
    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>