<?php
    
    require APP.'/src/render.php';
    $email = $_SESSION['email'] ?? '';
    echo render('home',['title' => 'Todo '.$email]);