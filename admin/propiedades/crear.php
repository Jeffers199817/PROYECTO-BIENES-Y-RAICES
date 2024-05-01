
<?php

require '../../includes/config/database.php';

$db=conectarDB();

//CONSULTAR PARA OBTENER LOS VENDEDORES

$consulta = "SELECT*FROM vendedores";

$resultado = mysqli_query($db, $consulta);

//ARREGLO CON MENSAJES DE ERRORES

$errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';


//EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO


if($_SERVER['REQUEST_METHOD'] ==='POST'){
     echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

     echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

 
    $titulo =mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId =mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y-m-d H:i:s');


    //asignar files a un arreglo 

    $imagen = $_FILES['imagen'];



  

    if(!$titulo){
        $errores[]="Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El Precio es Obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }

     if (!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatoria";
    }
     if (!$wc) {
        $errores[] = "El número de baños es obligatoria";
    }
    if (!$estacionamiento) {
        $errores[] = "El número de estacionamientos es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }

    if(!$imagen['name']|| $imagen['error']){
        $errores[] ='La imagen es Obligatoria';
    }

        //validar por tamaño 

    $medida = 1000 * 500;

    if($imagen['size']> $medida){
        $errores[] = 'La imagen es muy pesada';
    }


   /*  echo "<pre>";
    var_dump($errores);
    echo "</pre>";
    exit; */

//ESTE CONDICIÓN TIENE QUE DARSE SOLO SI EL ARREGLO ESTÁ VACIO CASO CONTRARIO NO. 

    if(empty($errores)){

//SUBIDA DE ARCHIVOS


//Crear carpeta 

        $carpetaImagenes = '../../imagenes/';

      

      if(!is_dir($carpetaImagenes)){
          mkdir($carpetaImagenes);


      }

      //Generar un nombre único 

        $nombreImagen = md5(uniqid(rand(), true)).".jpg";




      //subir la imagen

              move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);



    //INSERTAR EN LA BASE DE DATOS 

    $query = "INSERT INTO propiedades (titulo, precio,imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId)VALUES(
       '$titulo', '$precio','$nombreImagen', '$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";

        //echo $query;	

    //PARA ENVIAR A LA BASE DE DATOS 

   $resultado= mysqli_query($db, $query);

        if ($resultado)
            //redireccionar al usuario6
            header('Location: /admin?resultado=1');
        


}


    }







require '../../includes/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor">
        <h1>Crear</h1>
            <a href = "/admin" class="boton boton-verde"> Volver</a>
            
            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                <?php echo $error; ?>
                </div>
            <?php endforeach;?> 

            <form class="formulario"  method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
                <fieldset>
                    <legend> Información General</legend>

                    <label for="titulo"> Titulo:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value= "<?php echo $titulo ?>">

                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name ="precio" placeholder="Precio Propiead" value="<?php echo $precio ?>" >

                    <label for="imagen"> Imagen:</label>
                    <input type="file" id="imagen"  accept="image/jpeg, image/png" name="imagen">

                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" ><?php echo $descripcion ?></textarea>

                </fieldset>

                <fieldset>
                    <legend>Información Propiedad</legend>

                    <label for="habitaciones">Habitaciones:</label>
                    <input type="number" id="habitaciones" name="habitaciones" value="<?php echo $habitaciones ?>" placeholder="Ej: 3" min='1' max='9'>
                    
                    <label for="wc">Baños:</label>
                    <input type="number" id="wc"name="wc" value="<?php echo $wc ?>" placeholder="Ej: 3" min='1' max='9'>

                    <label for="estacionamiento">Estacionamiento:</label>
                    <input type="number" id="estacionamiento" name="estacionamiento" value="<?php echo $estacionamiento ?>" placeholder="Ej: 3" min='1' max='9'>


                </fieldset>

                <fieldset>
                    <legend> Vendedor</legend>
                    <select  name="vendedor" >
                        <option value=" ">-- Seleccione --</option>
                        <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                            <option  <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id']; ?>">
                             <?php echo $vendedor['nombre'] ." " . $vendedor['apellido']; ?> </option>
                            <?php endwhile ?>
                    </select>                    
                </fieldset>


                <input type="submit" value="Crear Propiedad" class="boton boton-verde"> 

            </form>
    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>