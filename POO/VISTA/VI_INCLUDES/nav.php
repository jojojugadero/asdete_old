

<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;



echo "<p style='font-size:large;'><h4>Empresas del sector</h4></p>

<ul class='lista-normal'>
  
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa1.php' class='enlace_sidebar'>Empresa 1</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa2.php' class='enlace_sidebar'>Empresa 2</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa3.php' class='enlace_sidebar'>Empresa 3</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa4.php' class='enlace_sidebar'>Empresa 4</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa5.php' class='enlace_sidebar'>Empresa 5</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa6.php' class='enlace_sidebar'>Empresa 6</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_EMPRESAS/empresa7.php' class='enlace_sidebar'>Empresa 7</a></li>

</ul>";

echo "<img src='".$dirRoot."POO/VISTA/IMAGENES/logoAsdete.png' alt='Logo Asdete' height='100' width='150'  />";

echo "<div style='margin-top:10px;'></div>";

echo "<p style='font-size:large;'><h4>Somos Asdete</h4></p>

<ul class='lista-normal'>

<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_UTILS/calendarios.php' class='enlace_sidebar'>Calendarios laborales</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_UTILS/empleo.php' class='enlace_sidebar'>Tu empleo</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_UTILS/formacion.php' class='enlace_sidebar'>Forma T</a></li>
<li class='li_barra_lateral'><a href='".$dirRoot."POO/VISTA/VI_UTILS/prestamos.php' class='enlace_sidebar'>Prestamos</a></li>

</ul>";



?>