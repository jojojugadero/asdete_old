

<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;



echo "<p style='font-size:large;'><h4>Empresas del sector</h4></p>

<ul>
  
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa1.php' class='enlace_sidebar'>Empresa 1</a></li>
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa2.php' class='enlace_sidebar'>Empresa 2</a></li>
<li class='li_sidebar'><a href=".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa3.php' class='enlace_sidebar'>Empresa 3</a></li>
<li class='li_sidebar'><a href=".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa4.php' class='enlace_sidebar'>Empresa 4</a></li>
<li class='li_sidebar'><a href=".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa5.php' class='enlace_sidebar'>Empresa 5</a></li>
<li class='li_sidebar'><a href=".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa6.php' class='enlace_sidebar'>Empresa 6</a></li>
<li class='li_sidebar'><a href=".$dirRoot."MVC_TOCAR/VISTA/VI_EMPRESAS/empresa7.php' class='enlace_sidebar'>Empresa 7</a></li>

</ul>";

echo "<div style='margin-top:40px;'></div>";

echo "<p style='font-size:large;'><h4>Somos Asdete</h4></p>

<ul>

<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_UTILS/calendarios.php' class='enlace_sidebar'>Calendarios laborales</a></li>
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_UTILS/empleo.php' class='enlace_sidebar'>Tu empleo</a></li>
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_UTILS/formacion.php' class='enlace_sidebar'>Forma T</a></li>
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_UTILS/prestamos.php' class='enlace_sidebar'>Afiliacion</a></li>
<li class='li_sidebar'><a href='".$dirRoot."MVC_TOCAR/VISTA/VI_UTILS/afiliacion.php' class='enlace_sidebar'>Prestamos</a></li>

</ul>";



?>