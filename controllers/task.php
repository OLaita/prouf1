<?php

    include __DIR__."/schema.php";
    include __DIR__."/../config.php";
    
    $db = connectMysql($dsn, $dbuser, $dbpass);


    if(isset($_POST['ck'])) {
        foreach ($_POST['ck'] as $key => $value) {
            deleteItems($db, $value);
            header('Location: ?url=allTask');
        }
    }

    if(isset($_POST['ed'])) {

        
        foreach ($_POST['ed'] as $key => $value) {
            $_SESSION['idTask'] = $value;
            $result = $db->query('SELECT * FROM tareas_hoy where id='.$_SESSION['idTask'].'');
            foreach($result as $row){
                $_SESSION['nTask'] = $row['description'];
            }
            header('Location: ?url=udTask');
        }
    }


    function showTaskNow($db){

        $userID = $_SESSION['userId'];

        $select = $db->prepare("SELECT * FROM tareas_hoy where user=:user");
        $select->execute(array(':user' => $userID));
        $result = $select->rowCount();
        $row = $select->fetchAll(PDO::FETCH_ASSOC);

        if($result > 0){

        $result = $db->query('SELECT * FROM tareas_hoy where user='.$userID.'');

            echo "<table class='table'>";

            echo "<thead class='bg-dark'>";
            echo "<tr class='text-light'>";

                echo "<td>Descripcion</td>";
                echo "<td>Fecha</td>";
                echo "<td>Completado</td>";

            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            
            $i = 0;
                
            foreach($result as $row){
            $k = $i;
                    
            $_SESSION['id'.$i] = $row['id'];
            $_SESSION['nTask'] = $row['description'];
                echo "<tr>";

                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['due_date']."</td>";
                        
                    if($row['completed'] == 0){
                        echo "<td>
                        <button class='btn' type='submit' name='ed[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/editar.svg'alt='Submit' width='48' height='48'>
                        </button>
                        <button class='btn' type='submit' name='ck[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/basura.svg'alt='Submit' width='48' height='48'>
                        </button></td>";
                        
                    }
                        
                echo "</tr>";
                $i++;
            }
            
            echo "</tbody>";
            echo "</table>";

        }else{
            echo "<p class='text-center'>No tienes tareas programadas para hoy</p>";
        }

        
    }

    function showTaskBien($db){

        $userID = $_SESSION['userId'];

        $select = $db->prepare("SELECT * FROM tareas_bien where user=:user");
        $select->execute(array(':user' => $userID));
        $result = $select->rowCount();
        $row = $select->fetchAll(PDO::FETCH_ASSOC);

        if($result > 0){

            $result = $db->query('SELECT * FROM tareas_bien where user='.$userID.'');

            echo "<table class='table'>";

            echo "<thead class='bg-dark'>";
            echo "<tr class='text-light'>";

                echo "<td>Descripcion</td>";
                echo "<td>Fecha</td>";
                echo "<td>Completado</td>";

            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            
            $i = 0;
                
            foreach($result as $row){
            $k = $i;
                    
            $_SESSION['id'.$i] = $row['id'];
                echo "<tr>";

                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['due_date']."</td>";
                        
                    if($row['completed'] == 0){
                        echo "<td>
                        <button class='btn' type='submit' name='ed[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/editar.svg'alt='Submit' width='48' height='48'>
                        </button>
                        <button class='btn' type='submit' name='ck[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/basura.svg'alt='Submit' width='48' height='48'>
                        </button></td>";
                        
                    }
                        
                echo "</tr>";
                $i++;
            }
            echo "</tbody>";
            

            echo "</table>";

        }else{
            echo "<p class='text-center'>No tienes tareas programadas para otros dias</p>";
        }

        
    }

    
        

    function showTaskret($db){

        $userID = $_SESSION['userId'];

        $select = $db->prepare("SELECT * FROM tareas_retrasadas where user=:user");
        $select->execute(array(':user' => $userID));
        $result = $select->rowCount();
        $row = $select->fetchAll(PDO::FETCH_ASSOC);

        if($result > 0){

            $result = $db->query('SELECT * FROM tareas_retrasadas where user='.$userID.'');

            echo "<table class='table'>";

            echo "<thead class='bg-dark'>";
            echo "<tr class='text-light'>";

                echo "<td>Descripcion</td>";
                echo "<td>Fecha</td>";
                echo "<td>Completado</td>";

            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            
            $i = 0;
                
            foreach($result as $row){
            $k = $i;
            $_SESSION['id'.$i] = $row['id'];
                echo "<tr>";

                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['due_date']."</td>";
                        
                    if($row['completed'] == 0){
                        echo "<td>
                        <button class='btn' type='submit' name='ed[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/editar.svg'alt='Submit' width='48' height='48'>
                        </button>
                        <button class='btn' type='submit' name='ck[<?=$k?>]' value='".$_SESSION['id'.$i]."'>
                        <img src='src/templates/Imagenes/basura.svg'alt='Submit' width='48' height='48'>
                        </button></td>";
                    }
                        
                echo "</tr>";
                $i++;
            }
            
            echo "</tbody>";
            echo "</table>";

        }else{
            echo "<p class='text-center'>No tienes tareas retrasadas</p>";
        }

        
    }


    