<?php

require '../includes/app.php';

estaAutenticado();

use App\Propiedad;


//IMPLEMENTAR UN MÉTODO PARA OBTENER TODAS LAS PROPIEDADES 

$propiedades = Propiedad::all();

//Importar la conexion

/* $db=conectarDB(); */
//Escribir los Query

/* $query = "SELECT*FROM propiedades";  

//Consultar la BD

$resultadoConsulta = mysqli_query($db, $query);
 */

$resultado = $_GET['resultado'] ?? null ;


///ELIMINAR 

if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){

        //eliminar el archivo 

        $query = "SELECT imagen FROM propiedades WHERE id=$id ";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes' . $propiedad['imagen']);


        //Eliminar la propiedad

        $query = "DELETE FROM propiedades WHERE id = $id ";
        $resultado = mysqli_query($db, $query);
        if($resultado){ 

            header('location: /admin');
        }
    }
}






incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes y Raices</h1>
        <?php if(intval($resultado) ===1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        
            <?php elseif(intval($resultado) === 2): ?>
                <p class="alerta exito " >Anuncio Actualizado Correctamente</p>  
            <?php endif; ?> 

    <a href = "/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>

    <table class="propiedades">

    <thead><!--MOSTAR LOS RESULTADOS-->
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody> <!-- mostar los resultados-->
    <?php foreach($propiedades as $propiedad): ?>

        <tr class="contenedor seccion">
            <td><?php echo $propiedad->id;?> </td>
            <td><?php echo $propiedad->titulo;?></td>
            <td><img src="/imagenes/<?php echo $propiedad->imagen;?>" class="imagen-tabla"></td>
            <td><?php echo $propiedad->precio;?></td>
            <td>
                <form method="POST" class="w-100">

                    <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
        
                <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>



       
    </main><!--FIN DE MAIN-->

<!--CERRAR LA CONEXIÓN--> 



<?php
//cerrar conexion

mysqli_close($db);

incluirTemplate('footer');
?>

