
<?php

    if(isset($_SESSION['personal_sesion']) == 'personal_sesion') {
        //$url1 = $dirRoot."POO\VISTA\ADMINISTRADORES\appAdmin.php";
        //header('Location: '.$url1);
      } else {
        $url2 =$dirRoot."POO/VISTA/index.php";
        header('Location: '.$url2);
      }

?>