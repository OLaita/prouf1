<?php

    include __DIR__."/../config.php";

    // creacion de tabla
    function schemaGenerator(PDO $db, string $tableName){

        $command="
        CREATE TABLE IF NOT EXISTS ".$tableName."(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL
        )";
        try{
            $db->exec($command);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    // añadir mas de un usuario con arrays
    function insertArray(PDO $db, $datos){

        if(is_array($datos)){
            foreach($datos as $row){
                foreach($row as $key=>$value){
                    if($key == "name"){
                        $user=$value;
                    }else{
                        $pass=$value;
                    }
                    $command2 = "INSERT INTO users (name,password) VALUES ('$user','$pass')";
                    try{
                        $db->exec($command2);
                    }catch(PDOException $e){
                        die($e->getMessage());
                    }
                }
            }    
        }

    }

    // crear usuarios 1 a 1
    function insertItems(PDO $db,string $email, string $user, string $pass){

        $stmt = $db->prepare("INSERT INTO users (email, uname, passw, role) VALUES (:email,:uname,:passw, 1)");

        if($stmt->execute([':email'=>$email, ':uname'=>$user, ':passw'=>$pass]) ){
            $mostrar = setcookie("mostrar", "USUARIO REGISTRADO");
            header('Location: ?url=login');
        }

    }

    function deleteItems(PDO $db, string $deleteId){

        $command3 = "DELETE FROM task WHERE id='$deleteId'";
        try{
            $db->exec($command3);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    function buscarUsuarios($db, $email, $user, $pass){
        $reg = filter_input(INPUT_POST, "reg");
        $save = filter_input(INPUT_POST, "save");

        $select = $db->prepare("SELECT * FROM users WHERE uname=:uname LIMIT 1");
        $select->execute(array(':uname' => $user));
        $result = $select->rowCount();
        $row = $select->fetchAll(PDO::FETCH_ASSOC);
        if ($result > 0) {
            if(isset($reg)){
                setcookie("regis", "USUARIO EXISTENTE");
                header('Location: ?url=registro');
            }else{
                $usuario = $row[0];
                $passV = password_verify($pass, $usuario['passw']);
                if($passV){
                    setcookie("mostrar", "SESION INICIADA");
                    $_SESSION["userId"] = $usuario['id'];
                    $_SESSION["userLogged"] = $usuario['uname'];
                    header('Location: ?url=allTask');
                }
            }
            
        }else {
            if(isset($reg)){
                $passH = password_hash($pass, PASSWORD_BCRYPT, ["cost"=>4]);
                insertItems($db, $email, $user, $passH);
                setcookie("mostrar", "USUARIO REGISTRADO");
                header('Location: ?url=login');
            }else{
                setcookie("mostrar", "NO EXISTE EL USUARIO");
                header('Location: ?url=login');
            }
                
        }

    }