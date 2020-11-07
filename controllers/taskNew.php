<?php

    include __DIR__."/schema.php";
    include __DIR__."/../config.php";
    
    $db = connectMysql($dsn, $dbuser, $dbpass);

    $description = filter_input(INPUT_POST, "description");
    $date = filter_input(INPUT_POST, "date");

    $userID = $_SESSION['userId'];
    $fecha = date("Y-m-d", strtotime($date));

    $stmt = $db->prepare("INSERT INTO task (description, user, due_date, completed)
            VALUES (:description,:user,:due_date,:completed)");

    if($stmt->execute([':description'=>$description, ':user'=>$userID,
        ':due_date'=>$fecha, ':completed'=>0]) ){
        header('Location: ?url=allTask');
    }else{
        header('Location: ?url=newTask');
    }
    