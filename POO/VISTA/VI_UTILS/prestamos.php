<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  
</head>


<body class="cuerpo_contenedor">

    <!––Incluimos la cabecera ––>
    <header class="cabecera">
        <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>


    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
       <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

                     <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>
</nav>
        <aside class="barra"><p style="font-size:large;">Contactos</p>

            <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
            <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

        </aside>

            <article class="skynet">
                <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Volver</a>

                <div class="container">
                       
                               
                             
                           
                             
                              





                                                        
      

       
                
                           

                  
                           

                           
                  


                               




                
                                    

                    




            </article>
            <footer class="pie"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>