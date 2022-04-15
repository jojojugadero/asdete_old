<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

session_start();
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO\VISTA\ESTILOS\estilos.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>


<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>">

    <!––Incluimos la cabecera ––>
        <header class="cabecera<?php echo $sufijo_estilo; ?>">
            <?php include $incRoot.'POO\VISTA\VI_INCLUDES\cabecera.php'?> 
        </header>

        <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
            <nav class="navega<?php echo $sufijo_estilo; ?>">
            <?php include $incRoot.'POO\VISTA\VI_INCLUDES\nav.php'?> 
            </nav>
            <aside class="barra<?php echo $sufijo_estilo; ?>">
                <p style="font-size:large;">Contactos</p>
                <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                <?php include $incRoot.'POO\VISTA\VI_INCLUDES\aside.php'?> 
            </aside>


            <article class="skynet<?php echo $sufijo_estilo; ?>">
                <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $url_volver; ?>">Volver</a>
                <br/><br/>

                
                <embed src="<?php echo $dirRoot; ?>POO/VISTA/FICHEROS/empresa1.pdf" type="application/pdf" width="100%" height="600px" />
                




            </article>
            <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>

</body>

</html>