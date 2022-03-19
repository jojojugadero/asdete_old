

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
include $incRoot.'POO/MODELO/afiliados.php';
include $incRoot.'POO/MODELO/empresa.php';

session_start();



//Comprobamos si se ha iniciado la sesión de afiliado

include $incRoot.'POO/CONTROLADOR/CO_AFILIADOS/appAfiliado.php';

$dat = new Datos();

  //Recogemos el id del afiliado
  $id_afil =  $_SESSION['id_afiliado'];
  //Con este metodo de la clase datos sacamos el nombre del afiliado con su ID
  $afiliado = Afiliados::getAfiliadoId($id_afil);

  //Con el id de la empresa sacamos los datos de la misma a traves del metodo getEmpresa() de la clase datos
  $empresa = Empresa::getEmpresaId($afiliado->getIdEmpresa());
  //Guardamos dicho nombre de la empresa en una variable
  $nom_empresa =  $empresa->getNombre();

  //Obtenemos las empresas para mostrarlas con el select
  $empresas = Empresa::getEmpresas();
?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
    <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

              <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
              <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

              <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

          </nav>



          <aside class="barra"><p style="font-size:large;">Contactos</p>

                 <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                 <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

          </aside>


    <article class="skynet">
    <!––Migas de pan (breadcrumbs) ––>
   
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_AFILIADOS/afiliadosLogin.php">Login</a>
    
    <!––Mostramos el nombre del afiliado con un saludo y con sus datos y si no son correctos le dejamos un link para escriba a administración y modifique sus datos ––>


    <!––Mandamos los datos de la empresa selecionada atraves de este select y en la página concino.php nos redirige al convenio de la empresa seleccionada ––>
<form name="saludoAfiliado" id="saludoAfiliado" action="<?php echo $dirRoot ?>POO/CONTROLADOR/convenios.php" method="post">
  
<div align="center" style="margin-top:100px;">
    <div class="afidiv" >
        <table >
            <tr>
                <td align="center" colspan="2"><?php echo "Hola ".$afiliado->getNombre() ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:20px;">Si ya no vive en la <?php echo $afiliado->getDireccion()?>,<br> o ya no trabaja en la empresa <?php echo $nom_empresa?><br>contacte con: <br>  <a href="administracion@asdete.com"> administración. administracion@asdete.com</a> </td>
            </tr>
            
        </table>
    </div>
        <table  style="padding-top:20px;">
            <tr>
              <td colspan="2">Seleccione su empresa: </td>
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


  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie"><?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


