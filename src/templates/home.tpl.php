<?php

    include 'src/templates/header.tpl.php';
    setcookie('mostrar', "Iniciar sesion");
    setcookie('regis', "Formulario de registro");

?>

    <main>
    
        <article>
            <h2><?= $title;?></h2>
        </article>
    
    </main>


<?php

include 'src/templates/footer.tpl.php';

?>