<?php 

//Importa la conexión


$db = conectarDB();



//crear un email y password

$email = "correo@correo.com";
$password = "123456";

//hashar los passowrd

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

var_dump($passwordHash) ;

//query para crear el usuario

$query = " INSERT INTO usuarios (email, password) VALUES ('$email','$passwordHash');";

 
//Agregarlo a la base de datos



mysqli_query($db, $query) ;

