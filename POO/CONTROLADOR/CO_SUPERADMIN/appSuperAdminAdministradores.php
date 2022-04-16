
<?php

//Iniciamos sesión
session_start();
//Comprobamos que la sesión es correcta y si es correcta se queda en la página  y si no, nos redirige a index.php 
if(isset($_SESSION['user_session']) == 'superadmin_session') {
  //$url1 ="appPersonal.php";
  //header('Location: '.$url1);
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}

//Instanciamos la clase Datos
$dat = new Datos();
//Instanciamos la clase Administrador
$admi = new Administrador();

//Utilizamos el método loadPost de la clase Administrador para cargar los datos que nos lleguen por POST
$admi->loadPost();


//Guardamos en variables los datos que nos legan por POST
$swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
$swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
$swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
$sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';



 //Con este operador ternario mejor preguntar al crack PREGUNTAR A PARTIR DE AQUÍ BIEN
$admin_modi = $swmodificar == 'S' ? Administrador::getAdministradorId($admi->getId()) : $admi;

$msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $admi->validar() : '';



if(trim($msgValidacion) != "") {
  $admin_modi = $admi;
}
if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
  $swmodificar = "N";
}
if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $dat->altaAdmin($admi->getDatos());
  } else if($swmodificarapply == 'S') {
    $dat->modAdmin($admi->getDatos());
  } else if($sweliminar == 'S') {
    $dat->eliminarAdmin($admi->getId());
  }
}

$mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = Afiliados::getAfiliados();
  $administradores = Administrador::getAdministradores();
    
?>