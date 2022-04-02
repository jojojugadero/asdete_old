<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';

$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
$ses_desc = '';
$ind_sesion = 'N';
$tipo_usuario = '';
$img_desconectar = '';
$url_desconectar = '';
if($sesion != ''){
    if($sesion == 'afiliado_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'Afiliado';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_afil.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> Afiliado</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'personal_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'Administrador';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_admin.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=admin&swlogout=S";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> Administrador</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'superadmin_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'SuperAdministrador';
        $img_desconectar = $dirRoot."POO/VISTA/IMAGENES/logout_sadmin.png";
        $url_desconectar = $dirRoot."POO/VISTA/index.php?tipologin=sadmin&swlogout=S";
        $ses_desc = "<p class='user-login'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Tipo usuario:</strong> SuperAdministrado</p>";
        $ses_desc .= "<br><p class='user-login'><strong>Desconectar:</strong>  <a title='Haz click para deslogearte' href ='".$dirRoot."POO/VISTA/index.php?tipologin=afil&swlogout=S'><img class='user-logout' src='".$dirRoot."POO/VISTA/IMAGENES/logout_afil.png'></a></p>";
    }
}
?>
<table width="100%">
    <tr>
        <td width="20%"></td>
        <td width="60%" align="center" valign="top"><h1>ASDETE, la unión hace la fuerza...</h1></td>
        <td width="20%">
            <?php if($ind_sesion == 'S') { ?>
            <table align="right" class="user-login-block">
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Nombre usuario:</strong></td>
                    <td align="left" valign="top" class="user-login-cell"><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Tipo usuario:</strong></td>
                    <td align="left" valign="top" class="user-login-cell"><?php echo $tipo_usuario; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Desconectar:</strong></td>
                    <td align="left" valign="top" class="user-login-cell"><a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'><img class='user-logout' src='<?php echo $img_desconectar; ?>'></a></td>
                </tr>
            </table>
            <?php } ?>
            </div>
        </td>
    </tr>
</table>




