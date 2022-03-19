<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
 <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
</head>
<?php

include $incRoot.'POO/MODELO/datos.php';

session_start();

$dat = new Datos();

$id_empresa_conv = $_POST['empresa'];
$empresa_conv = $dat->getEmpresa($id_empresa_conv);


if(isset($_SESSION['afiliado_sesion']) == 'afiliado_sesion') {
    $url1 =$dirRoot."POO/VISTA/VI_AFILIADOS/appAfiliados.php";
    //header('Location: '.$url1);
  } else {
    $url2 =$dirRoot."POO/VISTA/index.php";
    header('Location: '.$url2);
  }
  $id_afil =  $_SESSION['id_afiliado'];
  $afiliado = $dat->getAfiliado($id_afil);
  $id_empresa_conv = $_POST['empresa'];
  $_SESSION['id_empresa'] = $id_empresa_conv;
  $empresa_conv = $dat->getEmpresa($id_empresa_conv);

  
  //Elegimos el convenio de  empresas desde la pantalla de afiliados en un select
  if($id_empresa_conv == 1) {
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_1.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 2 ){
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_2.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 3 ){
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_3.php";
    header("Location: ".$url);
  }

  $empresas = $dat->getEmpresas();
?>

<body class="cuerpo_contenedor" >




    <header class="cabecera">
      <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

    <nav class="navega">

        
    </nav>
    <aside class="barra"></aside>


    <article class="skynet">

    


    </article>
    <footer class="pie"><?php include $incRoot."POO/VISTAVI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


