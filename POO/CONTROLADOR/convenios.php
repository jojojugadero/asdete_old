<?php
//Redirigimos las rutas de nuestra aplicación
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;


//Iniciamos sesión
session_start();
//Incluimos ControlEstilos.php para controlar que estilos usaremos dependiendo del usuario
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Convenios</title>
 <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
</head>
<?php

//Incluimos la clase datos
include $incRoot.'POO/MODELO/MO_UTILS/includesDatos.php';

//Instanciamos la clase Datos
$dat = new Datos();

//Recogemos el Id de Empresa que nos llegue por POST
$id_empresa_conv = $_POST['empresa'];
//A la clase instanciada Datos le pasamos como parametro el ID Convenio de Empresa y con su método getEmpresa obtenemos la empresa
$empresa_conv = $dat->getEmpresa($id_empresa_conv);

//Comprobamos que las sesión existe y que es es de tipo afiliado
if(isset($_SESSION['user_session']) == 'afiliado_session') {

  } else {
    $url2 =$dirRoot."POO/VISTA/index.php";
    header('Location: '.$url2);
  }

  //Guardamos en una variable el ID de Afiliado que nos llega por POST
  $id_afil =  $_SESSION['id_afiliado'];
  //Utilizamos el ID anterior copn el método getAfiliado para guardar el afiliado en una variable
  $afiliado = $dat->getAfiliado($id_afil);
  //Guardamos el ID de Empresa que nos llega por POST
  $id_empresa_conv = $_POST['empresa'];

  $_SESSION['id_empresa'] = $id_empresa_conv;
  $empresa_conv = $dat->getEmpresa($id_empresa_conv);

  
  //Elegimos el convenio de  empresas desde la pantalla de afiliados en un select según el ID de la empresa
  if($id_empresa_conv == 1) {
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_1.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 2 ){
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_2.php";
    header("Location: ".$url);
  }elseif($id_empresa_conv == 3 ){
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_3.php";
    header("Location: ".$url);
  }else {
    $url = $dirRoot."POO/VISTA/VI_CONVENIOS/convenios_empresa_noexiste.php";
    header("Location: ".$url);
  }

  $empresas = $dat->getEmpresas();
?>

<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>" >




    <header class="cabecera<?php echo $sufijo_estilo; ?>">
      <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

    <nav class="navega<?php echo $sufijo_estilo; ?>">

        
    </nav>
    <aside class="barra<?php echo $sufijo_estilo; ?>"></aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">

    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"><?php include $incRoot."POO/VISTAVI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


