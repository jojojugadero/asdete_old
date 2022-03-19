
<?php

      if(isset($_SESSION['afiliado_sesion']) == 'afiliado_sesion') {
    
        //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
      } else {
        $url2 = $dirRoot.'POO/VISTA/index.php';
        header('Location: '.$url2);
      }
    
?>