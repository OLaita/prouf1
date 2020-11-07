<?php

    include __DIR__."/schema.php";
    include __DIR__."/../config.php";

    $db = connectMysql($dsn, $dbuser, $dbpass);

    $c = filter_input(INPUT_POST, "cambio");
    $nTask = filter_input(INPUT_POST, "tn");
    $dTask = filter_input(INPUT_POST, "dt");
    $idTask = $_SESSION['idTask'];

    if(isset($c)){

        if(isset($nTask) && isset($dTask)){
            $command3 = "UPDATE task SET description='$nTask', due_date='$dTask' WHERE id=$idTask";
            try{
                $db->exec($command3);
                header('Location: ?url=allTask');
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }else{
            header('Location: ?url=udTask');
        }

    }

    