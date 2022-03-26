<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
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
    <!––Migas de pan (breadcrumbs) ––>
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/superAdminLogin.php">Login</a>
    

   <!––Aqui están los botones de las secciones de afiliados y administradores con acción en javascript para ir a la página correspondiente ––>
      <div style="margin-top:200px;">

         <span class="boton-padding boton-afiliado1">
            <button onclick="document.location.href='vistaSuperAdminAdministradores.php'" class="botafil" style="margin:5px;width:320px;padding:20px;font-size:28px;"><span>ADMINISTRADORES</span></button>
         </span>
         <span class="boton-padding boton-afiliado1">
            <button onclick="document.location.href='vistaSuperAdminEmpresas.php'" class="botpers" style="margin:5px;width:210px;padding:20px;font-size:28px;"><span>EMPRESAS</span></button>
         </span>
      </div>

   </article>
   <!––Pie de la página con un include en PHP ––>
    <footer class="pie"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>

</body>

</html>