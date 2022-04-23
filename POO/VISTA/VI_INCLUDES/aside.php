<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

echo "<ul>
<li class='li_contactos_titulo'>Teléfono</li>
<li class='li_contactos_valores'>912345678</li>
<li class='li_contactos_titulo'>Email</li>
<li class='li_contactos_valores'>admin@asdete.com</li>
<li class='li_contactos_titulo'>Dirección</li>
<li class='li_contactos_valores'>C\ Asdete 123</li>
</ul>";



?>