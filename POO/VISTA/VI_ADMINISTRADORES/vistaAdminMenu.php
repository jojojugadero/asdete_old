<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

//Iniciamos sesión

session_start();
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['user_session']) == 'superadmin_session') {
  //$url1 ="appPersonal.php";
  //header('Location: '.$url1);
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Asdete</title>
   <!––Linkamos hoja de estilos ––>
   <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</head>


<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>">

   <!––Incluimos la cabecera ––>
    <header class="cabecera<?php echo $sufijo_estilo; ?>">
        <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
    <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Empresas del sector</p>

                     <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

     </nav>

        <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

            <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
            <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

        </aside>


   <article class="skynet<?php echo $sufijo_estilo; ?>">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=sadmin">Indice</a>
    

   <!––Aqui están los botones de las secciones de afiliados y administradores con acción en javascript para ir a la página correspondiente ––>
      <div style="margin-top:200px;">

         <span class="boton-margen boton-afiliado1">
            <button onclick="document.location.href='vistaAdminAgenda.php'" class="botafil" style="margin:5px;width:320px;padding:20px;font-size:28px;"><span>AGENDA</span></button>
         </span>
         <span class="boton-margen boton-afiliado1">
            <button onclick="document.location.href='vistaAdmin.php'" class="botadmin" style="margin:5px;width:210px;padding:20px;font-size:28px;"><span>AFILIADOS</span></button>
         </span>
      </div>

   </article>
   <!––Pie de la página con un include en PHP ––>
    <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>

</body>

</html>