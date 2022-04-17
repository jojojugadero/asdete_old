<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

session_start();
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
 <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<?php

include $incRoot.'POO/MODELO/MO_UTILS/includesDatos.php';
$dat = new Datos();

if(isset($_SESSION['user_session']) == 'afiliado_session') {

  } else {
    $url2 =$dirRoot."POO/VISTA/index.php";
    header('Location: '.$url2);
  }
  $id_afil =  $_SESSION['id_afiliado'];
  $afiliado = $dat->getAfiliado($id_afil);
  $id_empresa_conv = $_SESSION['id_empresa'];
  $empresa_conv = $dat->getEmpresa($id_empresa_conv);

  $empresas = $dat->getEmpresas();
?>

<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>" >


<header class="cabecera<?php echo $sufijo_estilo; ?>">
        <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
              <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Empresas del sector</p>

              <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

          </nav>



          <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

                 <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                 <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

          </aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">

    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=afil">Indice</a> > <a href="<?php echo $dirRoot?>POO/VISTA/VI_AFILIADOS/vistaAfiliados.php">Afiliados</a>

    <h2>No existe definido convenio para la empresa seleccionada</h2>

    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"><?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


