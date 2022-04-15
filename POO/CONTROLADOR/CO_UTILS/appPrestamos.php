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
$sol_pres = new SolPrestamo();

$sol_pres->loadPost();

//Recogemos el id del afiliado
$swinsertar =  isset($_POST['swinsertar']) ? trim($_POST['swinsertar']) : '';
$id_afil =  isset($_SESSION['id_afiliado']) ? $_SESSION['id_afiliado'] : '';
$afiliado = Afiliados::getAfiliadoId($id_afil);
//Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
//$afiliado = SolPrestamo::getAfiliadoId($id_afil);

$msgValidacion = $swinsertar == 'S' ? $sol_pres->validar() : '';

if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $sol_pres->setEstadoPendiente();
    $dat->eliminarPrestamosIdAfil($sol_pres->getIdAfiliado());
    $dat->altaSolPrestamos($sol_pres->getDatos());

    $msgValidacion = "Solicitud enviada correctamente.";
  }
}

//Con el id de la empresa sacamos los datos de la misma a traves del metodo getEmpresa() de la clase datos
//$empresa = Empresa::getEmpresaId($afiliado->getIdEmpresa());
//Guardamos dicho nombre de la empresa en una variable
//$nom_empresa =  $empresa->getNombre();

//Obtenemos las empresas para mostrarlas con el select
$empresas = Empresa::getEmpresas();

//Obtenemos las afiliados para mostrarlas con el select
$afiliados = Afiliados::getAfiliados();

?>