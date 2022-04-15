
<?php

$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$ses_desc = '';
$ind_sesion = 'N';
$tipo_usuario = '';
$img_desconectar = '';
$url_desconectar = '';
$url_volver = '';
if($sesion != ''){
    if($sesion == 'afiliado_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'Afiliado';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_afil.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S";
        $url_volver = $dirRoot."POO/VISTA/VI_AFILIADOS/vistaAfiliados.php";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> Afiliado</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'administrador_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'Administrador';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_admin.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=admin&swlogout=S";
        $url_volver = $dirRoot."POO/VISTA/VI_ADMINISTRADORES/vistaAdminMenu.php";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> Administrador</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'superadmin_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'SuperAdministrador';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_sadmin.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=sadmin&swlogout=S";
        $url_volver = $dirRoot."POO/VISTA/VI_SUPERADMIN/vistaSuperAdminMenu.php";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> SuperAdministrado</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    }
}
?>