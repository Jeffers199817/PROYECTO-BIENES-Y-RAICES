
<?php
//Autenticar el usuario

if($_SERVER['REQUEST_METHOD']=='POST'){
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";


    $email =mysqli_real_escape_string($db, filter_var($_POST["email"],FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);
}




//incluye el header

require 'includes/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <form method="POST" class = "formulario">
        <fieldset>
        <legend> Email y Password</legend>

        <label for="email">E-mail </label>
        <input type ="email" name="email" placeholder="Tu email" id="email">
        <label for="password">Password</label>
        <input type="password"  name="password"placeholder="Tu Password"id="password"> 


        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>