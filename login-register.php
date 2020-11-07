<?php

require 'connect.php';
require 'src/schema.php';
//include 'index.php';


// coger mediante POST el usuario y contraseña
$user = filter_input(INPUT_POST, "name");
$pass = filter_input(INPUT_POST, "pass");
$pass = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>4]);

// Checkboxs del registro y de guardar los datos
$reg = filter_input(INPUT_POST, "reg");
$save = filter_input(INPUT_POST, "save");
$delCoo = filter_input(INPUT_POST, "delCoo");

$base=connectSqlite('usuarios');

// si el usuario o la contraseña estan vacios avisa que uno de los 2 estan vacios
if ($user != null || $pass != null) {
    // ver si quiere registrarse, en caso de TRUE crea el usuario, en caso contrario mira si existe el usuario
    if(isset($reg)){
        insertItems($base, $user, $pass);
        setcookie("mostrar", "USUARIO REGISTRADO");
        header('Location: /login');
    }else{
        if(isset($save)){
            setcookie('name', $user);
            setcookie('pass', $pass);
            setcookie('time', (string)getdate());
            $_SESSION['userLogged'] = $user;
        }
        // busca en la base de datos si esta el usuario con la contraseña
        buscarUsuarios($base, $user, $pass);
    }
} else {
    setcookie("mostrar", "El usuario o la contraseña estan vacios");
    header('Location: /login');
}


    