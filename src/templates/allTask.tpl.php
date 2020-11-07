<?php

    include 'src/templates/header.tpl.php';
    include 'controllers/task.php';


?>

    <main>
    
        <article>
            <h2>Todas las tareas</h2>
        </article>
        <h3><?php echo $_SESSION['userLogged']; ?></h3>
    
    </main>


    <div class="container">
    
    
    <form class="" action="?url=task" method="post">
    <h4 class="text-center">Tareas para hoy</h4>
    
    <?php
    
    showTaskNow($db);

    ?>
    
    </form>

    <form class="" action="?url=task" method="post">
    <h4 class="text-center">Tareas para otros dias</h4>

    <?php

    showTaskBien($db);

    ?>

    </form>

    <form class="" action="?url=task" method="post">
    <h4 class="text-center">Tareas Retrasadas</h4>

    <?php

    showTaskret($db);

    ?>

    </form>

    
    
    </div>


<?php

include 'src/templates/footer.tpl.php';

?>