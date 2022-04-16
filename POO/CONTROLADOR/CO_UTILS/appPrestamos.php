<?php
//Iniciamos sesión
session_start();

//Comprobamos que es una sesión de tipo "afiliado"
if(isset($_SESSION['user_session']) == 'afiliado_session') {

  //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
} else {
  $url2 = $dirRoot.'POO/VISTA/index.php';
  header('Location: '.$url2);
}

//Instanciamos la clase Datos
$dat = new Datos();
//Instanciamos la clase SolPrestamo
$sol_pres = new SolPrestamo();

//Utilizamos el método loadPost de la clase SolPrestamo para cargar los datos que nos llegan por POST
$sol_pres->loadPost();

//Recogemos el id del afiliado
$swinsertar =  isset($_POST['swinsertar']) ? trim($_POST['swinsertar']) : '';
$id_afil =  isset($_SESSION['id_afiliado']) ? $_SESSION['id_afiliado'] : '';
$afiliado = Afiliados::getAfiliadoId($id_afil);
//Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
//$afiliado = SolPrestamo::getAfiliadoId($id_afil);



//Con este operador ternario mejor preguntar al crack PREGUNTAR A PARTIR DE AQUÍ BIEN
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