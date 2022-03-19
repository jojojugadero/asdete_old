
<?php
//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['superadmin_session']) == 'superadmin_session') {
  //$url1 ="appPersonal.php";
  //header('Location: '.$url1);
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}
    
?>