<?php
//Comprobamos si se ha iniciado la sesión de afiliado

session_start();

if(isset($_SESSION['user_session']) == 'afiliado_session') {

  //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}

$dat = new Datos();
$sol_afil = new SolAfiliados();

$sol_afil->loadPost();

//Recogemos el id del afiliado
$swinsertar =  isset($_POST['swinsertar']) ? trim($_POST['swinsertar']) : '';
$id_afil =  $_SESSION['id_afiliado'];
//Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
$afiliado = Afiliados::getAfiliadoId($id_afil);

$msgValidacion = $swinsertar == 'S' ? $sol_afil->validar() : '';

if(trim($msgValidacion) != "") {
  $afil_modi = $afil;
}
if($swinsertar == 'S') {
  $afiliado->loadSolicitud($sol_afil->getDatos());
}
if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $dat->eliminarSolAfiliadoIdAfil($sol_afil->getIdAfiliado());
    $dat->altaSolAfiliado($sol_afil->getDatos());

    $msgValidacion = "Solicitud enviada correctamente.";
  }
}

//Con el id de la empresa sacamos los datos de la misma a traves del metodo getEmpresa() de la clase datos
$empresa = Empresa::getEmpresaId($afiliado->getIdEmpresa());
//Guardamos dicho nombre de la empresa en una variable
$nom_empresa =  $empresa->getNombre();

//Obtenemos las empresas para mostrarlas con el select
$empresas = Empresa::getEmpresas();
?>