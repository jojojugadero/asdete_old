<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Asdete</title>
   <!––Linkamos hoja de estilos ––>
   <link rel="stylesheet" href="VISTA/css/estilos.css">
</head>


<body class="cuerpo_contenedor">
<?php include "CONTROLADOR\internas\appAdmin.php";?>
<!––Incluimos la cabecera ––>
<header class="cabecera">
<?php llamaCabecera(); ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
   <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

      <ul >
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa5.php" class="enlace_sidebar">Empresa 5</a></li>
         <li class="li_sidebar"><a href="empresa6.php" class="enlace_sidebar">Empresa 6</a></li>
         <li class="li_sidebar"><a href="empresa7.php" class="enlace_sidebar">Empresa 7</a></li>
         <li class="li_sidebar"><a href="empresa8.php" class="enlace_sidebar">Empresa 8</a></li>
         <li class="li_sidebar"><a href="empresa9.php" class="enlace_sidebar">Empresa 9</a></li>
         <li class="li_sidebar"><a href="empresa10.php" class="enlace_sidebar">Empresa 10</a></li>
         <li class="li_sidebar"><a href="empresa11.php" class="enlace_sidebar">Empresa 11</a></li>
         <li class="li_sidebar"><a href="empresa12.php" class="enlace_sidebar">Empresa 12</a></li>
      </ul>
   </nav>
   <aside class="barra"><p style="font-size:large;">Contactos</p>
   <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
   <ul >
      <li class="li_nav1">Teléfono</li>
      <li class="li_nav2">912345678</li>
      <li class="li_nav1">Email</li>
      <li class="li_nav2">admin@asdete.com</li>
      <li class="li_nav1">Dirección</li>
      <li class="li_nav2">C\ Asdete 123</li>
   </ul>
   </aside>


   <article class="skynet">

   <!––Aqui están los botones de las secciones de afiliados y administradores con acción en javascript para ir a la página correspondiente ––>
      <div style="margin-top:200px;">

         <span class="boton-padding boton-afiliado1">
            <button onclick="document.location.href='CONTROLADOR\login\afiliadosLogin.php';" class="botafil" style="margin:5px;width:180px;padding:20px;font-size:28px;"><span>AFILIADOS</span></button>
         </span>
         <span class="boton-padding boton-afiliado1">
            <button onclick="document.location.href='CONTROLADOR\login\adminLogin.php';" class="botpers" style="margin:5px;width:180px;padding:20px;font-size:28px;"><span>PERSONAL</span></button>
         </span>
      </div>

   </article>
   <!––Pie de la página con un include en PHP ––>
   <footer class="pie"><?php include "VISTA/pie.php" ?></footer>

</body>

</html>