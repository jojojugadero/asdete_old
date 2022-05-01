
<?php

    //Iniciamos sesión
    session_start();
    //Comprobamos la sesión que nos llega
    if(isset($_SESSION['user_session']) == 'administrador_session') {
      //Si no es correcta redirigimos a index
      } else {
        $url2 =$dirRoot."VISTA/index.php";
        header('Location: '.$url2);
      }

      //Instanciamos la clase Datos
      $dat = new Datos();
      //Recogemos las variables indicadoras que nos llegan por POST para saber que operación realiza el usuario
      $id = isset($_POST['id']) ? $_POST['id'] : '';      
      $swaceptar_solafil =  isset($_POST['swaceptar_solafil']) ? $_POST['swaceptar_solafil'] : '';
      $swrechazar_solafil =  isset($_POST['swrechazar_solafil']) ? $_POST['swrechazar_solafil'] : '';
      $swaceptar_solpres =  isset($_POST['swaceptar_solpres']) ? $_POST['swaceptar_solpres'] : '';
      $swrechazar_solpres =  isset($_POST['swrechazar_solpres']) ? $_POST['swrechazar_solpres'] : '';
      
      //Comprobamos que acción se ha realizado el usuario para hacerla (Acetar/Rechazar datos) y (Aceptar/Rechazar prestamos)
      if($swaceptar_solafil == 'S') {
        //Recogemos solicitud de afiliado por ID
        $solafil = SolAfiliados::getSolAfiliadoId($id);
        //Eliminamos solicitud de afiliado por ID
        $dat->eliminarSolAfiliado($solafil->getId());
        //Recogemos afiliado por ID afiliado
        $afil = Afiliados::getAfiliadoId($solafil->getIdAfiliado());
        //Cargamos afiliado con datos de la solicitud
        $afil->loadSolicitud($solafil->getDatos());
        //Modificamos afiliado con nuevos datos
        $dat->modAfiliado($afil->getDatos());
      } else if($swrechazar_solafil == 'S') {
        //Recogemos solicitud de afiliado por ID
        $solafil = SolAfiliados::getSolAfiliadoId($id);
        //Eliminamos solicitud de afiliado por ID
        $dat->eliminarSolAfiliado($solafil->getId());
      } else if($swaceptar_solpres == 'S') {
        //Recogemos solicitud de prestamo por ID
        $solpres = SolPrestamo::getSolPrestamoId($id);
        //Establece estado correspondiente a prestamo
        $solpres->setEstadoAceptado();
        //Modificamos prestamo con estado actual
        $dat->modSolPrestamos($solpres->getDatos());
      } else if($swrechazar_solpres == 'S') {
        //Recogemos solicitud de prestamo por ID
        $solpres = SolPrestamo::getSolPrestamoId($id);
        //Establece estado correspondiente a prestamo
        $solpres->setEstadoRechazado();
        //Modificamos prestamo con estado actual
        $dat->modSolPrestamos($solpres->getDatos());
      }
        //Recogemos todos los afiliados,empresas y prestamos para mostarlos por pantalla
        $sol_afil = SolAfiliados::getSolAfiliados();
        $sol_pres = SolPrestamo::getSolPrestamos();
        $empresas = Empresa::getEmpresas();

?>