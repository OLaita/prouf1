<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<header>

    <h1 class="text-center list-group-item list-group-item-primary"><a href="?url=home">todo</a></h1>

</header>
<nav class="justify-content-between navbar navbar-expand-lg navbar-light bg-light">

    <ul class="list-group list-group-horizontal list-unstyled">
    <?php
            if(isset($_SESSION['userLogged'])){
                echo "<li class='list-group-item'><a href='?url=logout'>Logout</a></li>";
            }else{
                echo "<li class='list-group-item'><a href='?url=login'>Login</a></li>";
                echo "<li class='list-group-item'><a href='?url=registro'>Register</a></li>";
            }
    ?>
    </ul>
    <ul  class="align-items-center list-group list-group-horizontal list-unstyled">
    
    <?php
        if(isset($_SESSION['userLogged'])){
            echo "<li class='list-group-item'><a href='?url=profile'>Cuenta</a></li>";
            echo "<li class='list-group-item'><a href='?url=allTask'>Todas las tareas</a></li>";
            echo "<li class='list-group-item'><a href='?url=newTask'>Añadir tarea</a></li>";
        }
    ?>

    
    </ul>
</nav>
<hr>