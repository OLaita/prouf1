<?php

    include 'src/templates/header.tpl.php';

?>

    <main>
    
        <article class="text-center">
            <h2>REGISTRO</h2>
            <h4><?php echo $_COOKIE['regis']; ?></h4>
        </article>
    
    </main>

    <form class="d-flex justify-content-cente align-items-center flex-column" action="?url=login-register" method="post">
    <label for="correo">Email:</label>
    <div class="input-group col-md-4 text-center form-group">
            <input type="text" class="form-control text-center" placeholder="Enter email" id="email" name="correo">
            <div class="input-group-append">
                <span class="input-group-text">@correo.com</span>
            </div>
        </div>
        <div class="col-md-4 text-center form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control text-center" placeholder="Enter name" id="name" name="name">
        </div>
        <div class="d-flex">
        <div class="text-center form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control text-center" placeholder="Enter password" id="pwd" name="pass">
        </div>
        <div class="text-center form-group">
            <label for="pwd">Repeat Password:</label>
            <input type="password" class="form-control text-center" placeholder="Enter password" id="pwd" name="pass2">
        </div>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="switch1" name="reg">
            <label class="custom-control-label" for="switch1">Esta todo bien?</label><br><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>


<?php

include 'src/templates/footer.tpl.php';

?>