<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

echo "<ul>
<li class='li_nav1'>Teléfono</li>
<li class='li_nav2'>912345678</li>
<li class='li_nav1'>Email</li>
<li class='li_nav2'>admin@asdete.com</li>
<li class='li_nav1'>Dirección</li>
<li class='li_nav2'>C\ Asdete 123</li>
</ul>";



?>