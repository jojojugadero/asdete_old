<?php
//Iniciamos sesión
session_start();

//Comprobamos que es una sesión de tipo "afiliado"
if(isset($_SESSION['user_session']) == 'afiliado_session') {

  //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
} else {
  $url2 = $dirRoot.'VISTA/index.php';
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




//Se comprueba si se tiene que dar de alta un nuevo registro para validar los datos.
$msgValidacion = $swinsertar == 'S' ? $sol_pres->validar() : '';

if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    //Se establece estado pendiente en solicitud de prestamo
    $sol_pres->setEstadoPendiente();
    //Se elimina prestamos anteriores si hubiera para el afiliado
    $dat->eliminarPrestamosIdAfil($sol_pres->getIdAfiliado());
    //Se da de alta la solicitud de prestamo con los datos de pantalla
    $dat->altaSolPrestamos($sol_pres->getDatos());

    //Se establece mensaje de confirmación.
    $msgValidacion = "Solicitud enviada correctamente.";
  }
}



//Obtenemos las empresas para mostrarlas con el select
$empresas = Empresa::getEmpresas();

//Obtenemos las afiliados para mostrarlas con el select
$afiliados = Afiliados::getAfiliados();

?>