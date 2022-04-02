<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';

$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$ses_desc = '';
if($sesion != ''){
    if($sesion == 'afiliado_session'){
        $ses_desc = "<p><strong>Afiliado:</strong> ".$username. " (<a href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'>Desconectar</a>)</p>";
    } else if($sesion == 'personal_session'){
        $ses_desc = "<p><strong>Administrador:</strong> ".$username. " (<a href ='".$dirRoot."POO/VISTA/index.php?tipologin=admin&swlogout=S'>Desconectar</a>)</p>";
    } else if($sesion == 'superadmin_session'){
        $ses_desc = "<p><strong>SuperAdministrador:</strong> ".$username. " (<a href ='".$dirRoot."POO/VISTA/index.php?tipologin=sadmin&swlogout=S'>Desconectar</a>)</p>";
    }
}

echo "<h1>ASDETE, la unión hace la fuerza...</h1>";

echo $ses_desc;


?>
        
    






