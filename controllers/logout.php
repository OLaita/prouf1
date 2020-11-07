<?php
    
    /*require APP.'/src/render.php';

    echo render('logout',['title' => "My home"]);*/

    session_destroy();
    header('Location: index.php');