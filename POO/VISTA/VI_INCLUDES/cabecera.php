<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';

echo "<h1>ASDETE, la unión hace la fuerza...</h1>";

echo "<p><a href ='".$dirRoot."POO/VISTA/index.php'>Volver</a></p>";

echo "<p><a href ='".$dirRoot."POO/VISTA/VI_SUPERADMIN/superAdminLogin.php'>SUPER ADMIN</a></p>";



?>
        
    






