
<?php
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;
require '../../includes/app.php';

estaAutenticado();

$db = conectarDB();
$propiedad = new Propiedad();
// CONSULTAR PARA OBTENER LOS VENDEDORES

$consulta = 'SELECT*FROM vendedores';

$resultado = mysqli_query($db, $consulta);

// ARREGLO CON MENSAJES DE ERRORES

$errores = Propiedad::getErrores();

// EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crea una instancia de Propiedad
    $propiedad = new Propiedad($_POST['propiedad']);

    // SUBE LOS ARCHIVOS

    // Generar un nombre único

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // SETEA LA IMAGEN

    // REALIZA UN RESIXE CON INTERFECTION IMAGE
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }
    // VALIDAMOS
    $errores = $propiedad->validar();

    // ESTE CONDICIÓN TIENE QUE DARSE SOLO SI EL ARREGLO ESTÁ VACIO CASO CONTRARIO NO.


    if (empty($errores)) {
       

        // CREANDO LA CARPETA PARA SUBIR IMAGENES

        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // GUARDA LA IMAGEN EN EL SERVIDOR
        
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // PARA ENVIAR A LA BASE DE DATOS
       

        // mensaje de exito
         $propiedad->guardar();
       
    }
}

incluirTemplate('header');

?>

    <main class="contenedor">
        <h1>Crear</h1>
            <a href = "/admin" class="boton boton-verde"> Volver</a>
            
            <?php foreach ($errores as $error): ?>
                <div class="alerta error">
                <?php echo $error; ?>
                </div>
            <?php endforeach; ?> 

            <form class="formulario"  method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
             <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde"> 

            </form>
            
    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>