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

//Instanciamos la clase Datos
$dat = new Datos();
//Instanciamos la clase Afiliados
$empr = new Empresa();

//Utilizamos el método loadPost de la clase Afiliados para cargar los datos que nos lleguen por POST
$empr->loadPost();


//Guardamos en variables los datos que nos legan por POST
$swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
$swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
$swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
$sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';


//Si se modifica se coge el administrador de base de datos y si no se coge el que llega por pantalla
$empr_modi = $swmodificar == 'S' ? Empresa::getEmpresaId($empr->getId()) : $empr;

//Si se confirma el alta nueva o modificación hace validación.
$msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $empr->validar() : '';


//Si da error de validación se pone los datos de la empresa de pantalla para que los vuelva a poner en los campos
if(trim($msgValidacion) != "") {
  $empr_modi = $empr;
}
//Si pasa la validación OK y se confirma modificación se quita el indicador de modificación
if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
  $swmodificar = "N";
}
//Comprueba si es una modificación o no pasa la validación para saber si debe o no mostrar los datos por pantalla
$mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';
//Si pasa la validación OK comprueba si es un alta/modificación/eliminación para realizar dicha operación
if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $dat->altaEmpresa($empr->getDatos());
    $msgValidacion = "Se ha dado de alta la empresa correctamente.";
  } else if($swmodificarapply == 'S') {
    $dat->modEmpresa($empr->getDatos());
    $msgValidacion = "Se ha modificado la empresa correctamente.";
  } else if($sweliminar == 'S') {
    $dat->eliminarEmpresa($empr->getId());
    $msgValidacion = "Se ha eliminado la empresa correctamente.";
  }
}


  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = Afiliados::getAfiliados();
  $empresas = Empresa::getEmpresas();

?>