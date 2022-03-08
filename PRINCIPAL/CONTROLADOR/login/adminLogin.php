<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="VISTA/css/estilos.css">

    <!––Función en javascript, para ponerla en el "onclick()" para volver al indice ––>
        <script>
            function volver() {
                document.location.href = "VISTA/index.php";
            }
        </script>
</head>


<body class="cuerpo_contenedor">

<?php include "CONTROLADOR\internas\appAdmin.php";?>

<!––Incluimos la cabecera ––>

          <header class="cabecera">
        <?php llamaCabecera(); ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
            <nav class="navega">

                <?php  navegaAdministradores();?>

   </nav>

     <aside class="barra"><?php

        barraAdministradores();?>

   </aside>


    <article class="skynet">

    <?php include 'VISTA\includes\administradores\formAdminLogin.php';?>

    </article>

    <footer class="pie"><?php include "VISTA/pie.php" ?></footer>

</body>

</html>