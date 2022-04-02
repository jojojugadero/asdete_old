<?php


//Iniciamos sesión
session_start();
//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['user_session']) == 'superadmin_session') {
  //$url1 ="appPersonal.php";
  //header('Location: '.$url1);
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}
$dat = new Datos();
$empr = new Empresa();

$empr->loadPost();


$swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
$swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
$swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
$sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';


$empr_modi = $swmodificar == 'S' ? Empresa::getEmpresaId($empr->getId()) : $empr;

$msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $empr->validar() : '';



if(trim($msgValidacion) != "") {
  $empr_modi = $empr;
}
if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
  $swmodificar = "N";
}
if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $dat->altaEmpresa($empr->getDatos());
  } else if($swmodificarapply == 'S') {
    $dat->modEmpresa($empr->getDatos());
  } else if($sweliminar == 'S') {
    $dat->eliminarEmpresa($empr->getId());
  }
}

$mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = Afiliados::getAfiliados();
  $empresas = Empresa::getEmpresas();

?>