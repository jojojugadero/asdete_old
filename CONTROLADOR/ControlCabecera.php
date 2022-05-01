
<?php
//recogemos en variables los datos de SESSION y de USERNAME 
$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
$username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
//Creamos las diferentes variables que utilizaremos más adelante
$ses_desc = '';
$ind_sesion = 'N';
$tipo_usuario = '';
$img_desconectar = '';
$url_desconectar = '';
$url_volver = '';

//Comprobamos si existe la sesión
if($sesion != ''){

    //SI LA SESIÓN EXISTE comprobamos de que TIPO es y realizamos distintas acciones para cada una de ellas
    if($sesion == 'afiliado_session'){
        //Ponemos a 'S' la variable $ind_sesion que usaremos más adelante
        $ind_sesion = 'S';
        //En la variable $tipo_usuario guardaremos el tipo de usuario que ha iniicado sesión y que se mostrará por pantalla
        $tipo_usuario = 'Afiliado';
        //Aquí guardamos la imagen de logout correspondiente al usuario 
        $img_desconectar = $dirRoot."VISTA/IMAGENES/logout_afil.png";
        //Almacenamos la URL a la que nos redirigimos 
        $url_desconectar = $dirRoot."VISTA/index.php?tipologin=afil&swlogout=S";
        //Almacenamos la URL para volver a donde corresponda
        $url_volver = $dirRoot."VISTA/VI_AFILIADOS/vistaAfiliados.php";
        //Aqui mostramos estilos "dinamicamente" según el tipo de usuario correspondiente
        $ses_desc = "<p class='loginUsuario'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Tipo usuario:</strong> Afiliado</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Desconectar:</strong>  <a title='Haz click para cerrar sesión' href ='".$dirRoot."VISTA/index.php?tipologin=afil&swlogout=S'><img class='logoutUsuario' src='".$dirRoot."VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'administrador_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'Administrador';
        $img_desconectar = $dirRoot."VISTA/IMAGENES/logout_admin.png";
        $url_desconectar = $dirRoot."VISTA/index.php?tipologin=admin&swlogout=S";
        $url_volver = $dirRoot."VISTA/VI_ADMINISTRADORES/vistaAdminMenu.php";
        $ses_desc = "<p class='loginUsuario'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Tipo usuario:</strong> Administrador</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Desconectar:</strong>  <a title='Haz click para cerrar sesión' href ='".$dirRoot."VISTA/index.php?tipologin=afil&swlogout=S'><img class='logoutUsuario' src='".$dirRoot."VISTA/IMAGENES/logout_afil.png'></a></p>";
    } else if($sesion == 'superadmin_session'){
        $ind_sesion = 'S';
        $tipo_usuario = 'SuperAdministrador';
        $img_desconectar = $dirRoot."VISTA/IMAGENES/logout_sadmin.png";
        $url_desconectar = $dirRoot."VISTA/index.php?tipologin=sadmin&swlogout=S";
        $url_volver = $dirRoot."VISTA/VI_SUPERADMIN/vistaSuperAdminMenu.php";
        $ses_desc = "<p class='loginUsuario'><strong>Nombre usuario:</strong> ".$username."</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Tipo usuario:</strong> SuperAdministrado</p>";
        $ses_desc .= "<br><p class='loginUsuario'><strong>Desconectar:</strong>  <a title='Haz click para cerrar sesión' href ='".$dirRoot."VISTA/index.php?tipologin=afil&swlogout=S'><img class='logoutUsuario' src='".$dirRoot."VISTA/IMAGENES/logout_afil.png'></a></p>";
    }
}
?>