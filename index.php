<?php

    //activacion de errores
    ini_set('display_errors', 'On');

    //configuracion de entorno
    session_start();
    define('APP', __DIR__);
    require APP.'/src/route.php';

    //base de datos
    require 'start.php';

    //enrutamiento
    $controller = getRoute();

    //redirigir a ruta capturada
    require APP.'/controllers/'.$controller.'.php';