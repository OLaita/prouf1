<?php

include __DIR__."/schema.php";
include __DIR__."/../config.php";

$db = connectMysql($dsn, $dbuser, $dbpass);

$correo = filter_input(INPUT_POST, "correo");
$correo = $correo."@correo.com";
$name = filter_input(INPUT_POST, "name");
$pass = filter_input(INPUT_POST, "pass");
$pass2 = filter_input(INPUT_POST, "pass2");


$save = filter_input(INPUT_POST, "save");
$reg = filter_input(INPUT_POST, "reg");


if($name != null && $pass != null){

    if(isset($reg)){
        if($pass == $pass2){
            buscarUsuarios($db, $correo, $name, $pass);
        }else{
            setcookie("mostrar", "Las contraseñas no coinciden");
            header('Location: ?url=registro');
        }
    }else{
        if(isset($save)){
            setcookie("name", $name);
            setcookie("passwd", PASSWORD_BCRYPT, ["cost"=>4]);
        }
        buscarUsuarios($db, $correo, $name, $pass);
    }

}else{
    $mostrar = setcookie("mostrar", "El usuario o contraseña vacios");
    header('Location: ?url=login');
}