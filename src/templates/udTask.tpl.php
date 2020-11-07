<?php

    include 'src/templates/header.tpl.php';
    include 'controllers/task.php';


?>

    <main>
    
        <article>
            <h2>Editar Tarea</h2>
        </article>
    
    </main>


    <div class="container">
    
    
    <form class="d-flex justify-content-cente align-items-center flex-column" action="?url=updateTask" method="post">

    <div class="col-md-6 text-center form-group">
            <label for="name">Task Name:</label>
            <input type="text" class="form-control text-center" placeholder="<?php echo $_SESSION['nTask']; ?>" id="name" name="tn">
        </div>
        <div class="col-md-6 text-center form-group">
            <label for="date">Fecha:</label>
            <input type="date" class="form-control text-center" id="date" name="dt">
        </div>
        <button type="submit" name="cambio" class="btn btn-primary">Submit</button>
    

    </form>

    
    
    </div>


<?php

include 'src/templates/footer.tpl.php';

?>