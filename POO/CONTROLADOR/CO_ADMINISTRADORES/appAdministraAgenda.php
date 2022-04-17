
<?php

    //Iniciamos sesión
    session_start();
    
    if(isset($_SESSION['user_session']) == 'administrador_session') {
        //$url1 = $dirRoot."POO\VISTA\ADMINISTRADORES\appAdmin.php";
        //header('Location: '.$url1);
      } else {
        $url2 =$dirRoot."POO/VISTA/index.php";
        header('Location: '.$url2);
      }


      //Instanciamos la clase Datos
      $dat = new Datos();
      //Instanciamos la clase Afiliados
      $afil = new Afiliados();
      
      //Utilizamos el método loadPost de la clase Afiliados para cargar los datos que nos lleguen por POST
      $afil->loadPost();
      
      //Recogemos las variables indicadoras que nos llegan por POST para saber que operación realiza el usuario
      $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
      $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
      $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
      $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';
      
      

      //Si se modifica se coge el afiliado de base de datos y si no se coge el que llega por pantalla
      $afil_modi = $swmodificar == 'S' ? Afiliados::getAfiliadoId($afil->getId()) : $afil;
      
       //Si se confirma el alta nueva o modificación hace validación.
      $msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $afil->validar() : '';
      
      
      //Si da error de validación se pone los datos del afiliado de pantalla para que los vuelva a poner en los campos
      if(trim($msgValidacion) != "") {
        $afil_modi = $afil;
      }
      //Si pasa la validación OK y se confirma modificación se quita el indicador de modificación 
      if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
        $swmodificar = "N";
      }
      //Si pasa la validación OK comprueba si es un alta/modificación/eliminación para realizar dicha operación
      if(trim($msgValidacion) == "") {
        if($swinsertar == 'S') {
          $dat->altaAfiliado($afil->getDatos());
        } else if($swmodificarapply == 'S') {
          $dat->modAfiliado($afil->getDatos());
        } else if($sweliminar == 'S') {
          $dat->eliminarAfiliado($afil->getId());
        }
      }
      
      //Comprueba si es una modificación o no pasa la validación para saber si debe o no mostrar los datos por pantalla
      $mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';
      
        //Recogemos todos los afiliados y empresas para mostarlos por pantalla
        $afiliados = Afiliados::getAfiliados();
        $empresas = Empresa::getEmpresas();
?>