
<?php

    //Iniciamos sesión
    session_start();
    
    if(isset($_SESSION['personal_sesion']) == 'personal_sesion') {
        //$url1 = $dirRoot."POO\VISTA\ADMINISTRADORES\appAdmin.php";
        //header('Location: '.$url1);
      } else {
        $url2 =$dirRoot."POO/VISTA/index.php";
        header('Location: '.$url2);
      }


      $dat = new Datos();
      $afil = new Afiliados();
      
      $afil->loadPost();
      
      
      $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
      $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
      $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
      $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';
      
      
      $afil_modi = $swmodificar == 'S' ? Afiliados::getAfiliadoId($afil->getId()) : $afil;
      
      $msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $afil->validar() : '';
      
      
      
      if(trim($msgValidacion) != "") {
        $afil_modi = $afil;
      }
      if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
        $swmodificar = "N";
      }
      if(trim($msgValidacion) == "") {
        if($swinsertar == 'S') {
          $dat->altaAfiliado($afil->getDatos());
        } else if($swmodificarapply == 'S') {
          $dat->modAfiliado($afil->getDatos());
        } else if($sweliminar == 'S') {
          $dat->eliminarAfiliado($afil->getId());
        }
      }
      
      $mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';
      
        //Recogemos todos los afiliados y empresas para mostarlos por pantalla
        $afiliados = Afiliados::getAfiliados();
        $empresas = Empresa::getEmpresas();
?>