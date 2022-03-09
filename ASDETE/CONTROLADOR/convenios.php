
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="ASDETE\VISTA\ESTILOS\estilos.css">
</head>
<?php

include 'ASDETE\MODELO\datos.php';

session_start();

$id_empresa_conv = $_POST['empresa'];
$empresa_conv = getEmpresa($id_empresa_conv);

if(isset($_SESSION['afiliado_sesion']) == 'afiliado_sesion') {
    $url1 ="ASDETE\VISTA\AFILIADOS\appAfiliados.php";
    header('Location: '.$url1);
  } else {
    $url2 ="ASDETE\VISTA\index.php";
    header('Location: '.$url2);
  }
  $id_afil =  $_SESSION['id_afiliado'];
  $afiliado = getAfiliado($id_afil);
  $id_empresa_conv = $_POST['empresa'];
  $_SESSION['id_empresa'] = $id_empresa_conv;
  $empresa_conv = getEmpresa($id_empresa_conv);


  //Elegimos el convenio de  empresas desde la pantalla de afiliados en un select
  if($id_empresa_conv == 1) {
    $url = "ASDETE\VISTA\CONVENIOS\convenios_empresa_1.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 2 ){
    $url = "ASDETE\VISTA\CONVENIOS\convenios_empresa_2.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 3 ){
    $url = "ASDETE\VISTA\CONVENIOS\convenios_empresa_3.php";
    header("Location: ".$url);
  }

  $empresas = getEmpresas();
?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
      <?php include "ASDETE\VISTA\INCLUDES\cabecera.php" ?>
    </header>

    <nav class="navega">

        
    </nav>
    <aside class="barra"></aside>


    <article class="skynet">

    


    </article>
    <footer class="pie"><?php include "ASDETE\VISTA\INCLUDES\pie.php" ?></footer>
    

</body>
</html>


