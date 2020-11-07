<?php

    include 'src/templates/header.tpl.php';


?>

    <main>
    
        <article>
            <h2>Todas las tareas</h2>
        </article>
        <h3><?php echo $_SESSION['userLogged']; ?></h3>
    
    </main>

    

    <div>
    
    <h4>Crear tarea</h4>

    <form class="d-flex justify-content-cente align-items-center flex-column" action="?url=taskNew" method="post">
        <div class="col-md-6 text-center form-group">
            <label for="name">Descripcion:</label>
            <input type="text" class="form-control text-center" placeholder="Enter description" id="description" name="description">
        </div>
        <div class="col-md-6 text-center form-group">
            <label for="pwd">Fecha:</label>
            <input type="date" class="form-control text-center" id="date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    
    
    </div>


<?php

include 'src/templates/footer.tpl.php';

?>