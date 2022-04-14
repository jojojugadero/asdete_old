
<?php
$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
$sufijo_estilo = '';
if($sesion != ''){
    if($sesion == 'afiliado_session'){
        $sufijo_estilo = '_afil';
    } else if($sesion == 'administrador_session'){
        $sufijo_estilo = '_admin';
    } else if($sesion == 'superadmin_session'){
        $sufijo_estilo = '_sadmin';
    }
}
?>