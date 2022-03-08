
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="VISTA/css/estilos.css">
</head>
<?php

include 'MODELO/BBDD/datos.php';

session_start();


//Comprobamos si se ha iniciado la sesión de afiliado

if(isset($_SESSION['afiliado_sesion']) == 'afiliado_sesion') {
    
    //Si no se ha inicado la sesión de afiliado lo redireccionamos al indice
  } else {
    $url2 ="index.php";
    header('Location: '.$url2);
  }

  //Recogemos el id del afiliado
  $id_afil =  $_SESSION['id_afiliado'];
  //Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
  $afiliado = getAfiliado($id_afil);

  //Recogemos los datos del afiliado 
  $nombre =  $afiliado['nombre'];
  $ape1 =  $afiliado['apellido1'];
  $ape2 =  $afiliado['apellido2'];
  $direccion =  $afiliado['direccion'];

   //Sacamos el id de la empresa a traves del afiliado
  $id_empresa =  $afiliado['id_empresa_fk'];
 
  //Con el id de la empresa sacamos los datos de la misma a traves del metodo getEmpresa() de la clase datos
  $empresa = getEmpresa($id_empresa);
  //Guardamos dicho nombre de la empresa en una variable
  $nom_empresa =  $empresa['nombre'];

  //Obtenemos las empresas para mostrarlas con el select
  $empresas = getEmpresas();
?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
      <?php include "VISTA/cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
    <nav class="navega"><?php

        include 'VISTA\includes\administradores\navegaAdministradores.php';?>
     </nav>
     <aside class="barra"><?php include 'VISTA\includes\administradores\navegaAdministradores.php';?>

      
      </aside>


    <article class="skynet">
    <?php include 'VISTA\includes\afiliados\barraAfiliados.php';?>
    </article>
    <footer class="pie"><?php include "VISTA/pie.php" ?></footer>
    

</body>
</html>


