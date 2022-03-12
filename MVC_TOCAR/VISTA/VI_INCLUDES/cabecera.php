<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';

echo "<h1>ASDETE, la unión hace la fuerza...</h1>";

echo "<p><a href ='".$dirRoot."MVC_TOCAR/VISTA/index.php'>Volver</a></p>";

echo "<p><a href ='SUPERADMIN\superAdminLogin.php'>SUPER ADMIN</a></p>";



?>
        
    






