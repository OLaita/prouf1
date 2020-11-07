<?php

    include 'src/templates/header.tpl.php';


?>

    <main>
    
        <article>
            <h2>PROFILE</h2>
        </article>
    
    </main>

    <h3><?php echo $_SESSION['userLogged']; ?></h3>

    <form action="../profile-prog.php" method="post">
    
    Borrar las cookies: <input type="checkbox" name="delCoo"><br>
    <input type="submit">
    
    </form>


<?php

include 'src/templates/footer.tpl.php';

?>