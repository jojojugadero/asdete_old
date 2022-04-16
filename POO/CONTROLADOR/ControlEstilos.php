
<?php
//Guardamos en una variable el TIPO de usuario que ha iniciado SESIÓN
$sesion = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : '';
//Creamos la variable donde almacenaremos el sufijo que le daremos al estilo según el tipo de usuario 
$sufijo_estilo = '';
//Comprobamos que la sesión existe
if($sesion != ''){
    //Si la sesión existe comprobamos de que tipo es y dependiendo de ello ponemos un sufijo u otro que después usaremos en la vista para modificar los estilos
    if($sesion == 'afiliado_session'){
        $sufijo_estilo = '_afil';
    } else if($sesion == 'administrador_session'){
        $sufijo_estilo = '_admin';
    } else if($sesion == 'superadmin_session'){
        $sufijo_estilo = '_sadmin';
    }
}
?>