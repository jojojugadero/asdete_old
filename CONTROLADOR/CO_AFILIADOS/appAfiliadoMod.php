<?php

//Iniciamos sesión
session_start();

//Comprobamos si se ha iniciado la sesión de afiliado
if(isset($_SESSION['user_session']) == 'afiliado_session') {

  //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
} else {
  $url2 = $dirRoot.'VISTA/index.php';
  header('Location: '.$url2);
}


 //Instanciamos la clase Datos
$dat = new Datos();
//Instanciamos la clase SolAfiliados
$sol_afil = new SolAfiliados();

//Utilizamos el método loadPost de la clase SolAfiliados para cargar los datos que nos lleguen por POST
$sol_afil->loadPost();

//Recogemos el id del afiliado
$swinsertar =  isset($_POST['swinsertar']) ? trim($_POST['swinsertar']) : '';
$id_afil =  isset($_SESSION['id_afiliado']) ? $_SESSION['id_afiliado'] : '';


//Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
$afiliado = Afiliados::getAfiliadoId($id_afil);



 //Si se confirma el alta nueva o modificación hace validación.
$msgValidacion = $swinsertar == 'S' ? $sol_afil->validar() : '';


 //Si da error de validación se pone los datos del afiliado de pantalla para que los vuelva a poner en los campos
if(trim($msgValidacion) != "") {
  $afiliado->loadSolicitud($sol_afil->getDatos());
}
//Si inserta los datos se pone los datos del afiliado de pantalla para que los vuelva a poner en los campos
if($swinsertar == 'S') {
  $afiliado->loadSolicitud($sol_afil->getDatos());
}

//Si pasa la validación OK comprueba si es un alta de solicitud para realizar dicha operación
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