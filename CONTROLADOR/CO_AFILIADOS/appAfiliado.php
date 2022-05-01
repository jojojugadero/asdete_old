
<?php
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

    //Recogemos el id del afiliado
    $id_afil =  $_SESSION['id_afiliado'];
    //Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
    $afiliado = Afiliados::getAfiliadoId($id_afil);

    //Con el id de la empresa sacamos los datos de la misma a traves del metodo getEmpresa() de la clase datos
    $empresa = Empresa::getEmpresaId($afiliado->getIdEmpresa());
    //Guardamos dicho nombre de la empresa en una variable
    $nom_empresa =  $empresa->getNombre();

    //Obtenemos las empresas para mostrarlas con el select
    $empresas = Empresa::getEmpresas();
?>