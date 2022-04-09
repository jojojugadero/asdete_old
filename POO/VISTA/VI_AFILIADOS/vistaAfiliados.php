

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

include $incRoot.'POO/MODELO/MO_AFILIADOS/includesAfiliados.php';

include $incRoot.'POO/CONTROLADOR/CO_AFILIADOS/appAfiliado.php';

?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
    <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    </header>

              <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
              <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

              <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

          </nav>



          <aside class="barra"><p style="font-size:large;">Contactos</p>

                 <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                 <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

          </aside>


    <article class="skynet bg-personas">
    <!––Migas de pan (breadcrumbs) ––>
    
    <span class="link-afiliados">
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=afil">Indice</a>
    </span>
    <!––Mostramos el nombre del afiliado con un saludo y con sus datos y si no son correctos le dejamos un link para escriba a administración y modifique sus datos ––>


    <!––Mandamos los datos de la empresa selecionada atraves de este select y en la página concino.php nos redirige al convenio de la empresa seleccionada ––>
<form name="saludoAfiliado" id="saludoAfiliado" action="<?php echo $dirRoot ?>POO/CONTROLADOR/convenios.php" method="post">
<div>
  
  <div class="afil-container">
    <div class="row">
        <div class="afil-center">

            <div class="col-md-5 afil-form-1">
                <h3><?php echo "Hola ".$afiliado->getNombre() ?></h3>
                <table >
                    <tr>
                        <td colspan="2" style="padding-top:20px;" align="left">Si ya no vive en la <?php echo $afiliado->getDireccion()?>,<br> o ya no trabaja en la empresa <?php echo $nom_empresa?><br>contacte con: <br>  <a href="administracion@asdete.com"> administración. administracion@asdete.com</a> </td>
                    </tr>
                    
                </table>
            </div>

          <div class="col-md-5  afil-form-2">
                
              <table  style="padding-top:20px;">
                    <tr>
                      <td colspan="2" align="left">Seleccione su empresa: </td>
                    </tr>
                    <tr>
                      <td>
                      <!––Con este option mostramos las empresas desde base de datos para seleccionar el convenio que el afiliado quiera consultar, con el action del form de  más arriba nos llevara a convenios.php donde se nos redirigira a la página del convenio seleccionado  ––>
                        <select name='empresa' class='centrado'>
                          <option value="">Seleccionar</option>
                          <?php
                          //En este select mostramos las empresas con el método anterior getEmpresas()
                              if (count($empresas) == 0) {
                              } else {
                                foreach($empresas as $fila_option){
                            ?>
                            <option  value="<?php echo $fila_option->getId() ?>"><?php echo $fila_option->getNombre() ?></option>
                            <?php
                              }
                            }
                            ?>
                        </select>
                      </td>
                      <td ><input value="Seleccionar convenio" name="selconv" type="submit" /></td>
                    </tr>
                    
                </table>
              </div>
            </div>
        </div>
</div>

  <p>&nbsp;</p>
</form>
</div>
    </article>
    <footer class="pie"><?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


