
<?php
//Autenticar el usuario

require 'includes/app.php';



$db=conectarDB();

$errores =[ ];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (!$email) {
        $errores[] = 'El email es obligatorio o no es válido';
    }

    if (!$password) {
        $errores[] = 'El Password es obligatorio';

    }

    if(empty($errores)) {

        // Revisar si el usuario existe.

        $query = "SELECT*FROM usuarios WHERE email='$email';";
        $resultado = mysqli_query($db, $query);
       

        if($resultado->num_rows){
            //Revisar si el password es correcto

            $usuario =mysqli_fetch_assoc($resultado);
          /*   var_dump($usuario['password']); */

            //verificar si el password es correcto o no;

            $auth = password_verify($password, $usuario['password']);

            if ($auth == true) {
                // El usuario está autenticado

                session_start();

                //LLenar el arreglo de la sessiones

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');

            } else {
                // el passsword es incorrecto
                $errores[] = 'El password es incorrecto';
            }
        


        }else{
            $errores[] = "El Usuario no existe";
        }
   
     }


 }

//incluye el header


incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error"> 
            <?php echo $error; ?>
    </div>
    <?php endforeach; ?>



        <form method="POST" class = "formulario" novalidate>
        <fieldset>
        <legend> Email y Password</legend>

        <label for="email">E-mail </label>
        <input type ="email" name="email" placeholder="Tu email" id="email" >
        <label for="password">Password</label>
        <input type="password"  name="password"placeholder="Tu Password"id="password"> 


        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main><!--FIN DE MAIN-->

<?php
incluirTemplate('footer');
?>