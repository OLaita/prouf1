<?php

    include 'src/templates/header.tpl.php';

?>

    <main>
    
        <article class="text-center">
            <h2>LOGIN</h2>
            <h4><?php echo $_COOKIE['mostrar']; ?></h4>
        </article>
    
    </main>

    <form class="d-flex justify-content-cente align-items-center flex-column" action="?url=login-register" method="post">
        <div class="col-md-6 text-center form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control text-center" placeholder="Enter user" id="name" name="name">
        </div>
        <div class="col-md-6 text-center form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control text-center" placeholder="Enter password" id="pwd" name="pass">
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switch1" name="save">
            <label class="custom-control-label" for="switch1">Recuerdame</label><br><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


<?php

include 'src/templates/footer.tpl.php';

?>