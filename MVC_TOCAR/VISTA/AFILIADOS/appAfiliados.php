
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="MVC_TOCAR\VISTA\ESTILOS\estilos.css">
</head>
<?php

include 'datos.php';

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
      <?php include "cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
   <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

      <ul >
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
      </ul>
   </nav>
   <aside class="barra"><p style="font-size:large;">Contactos</p>
   <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
   <ul >
      <li class="li_nav1">Teléfono</li>
      <li class="li_nav2">912345678</li>
      <li class="li_nav1">Email</li>
      <li class="li_nav2">admin@asdete.com</li>
      <li class="li_nav1">Dirección</li>
      <li class="li_nav2">C\ Asdete 123</li>
   </ul>
   </aside>


    <article class="skynet">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="index.php">Indice</a> > <a href="afiliadosLogin.php">Login</a>
    
    <!––Mostramos el nombre del afiliado con un saludo y con sus datos y si no son correctos le dejamos un link para escriba a administración y modifique sus datos ––>


    <!––Mandamos los datos de la empresa selecionada atraves de este select y en la página concino.php nos redirige al convenio de la empresa seleccionada ––>
<form name="saludoAfiliado" id="saludoAfiliado" action="convenios.php" method="post">
  
<div align="center" style="margin-top:100px;">
    <div class="afidiv" >
        <table >
            <tr>
                <td align="center" colspan="2"><?php echo "Hola ".$nombre ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:20px;">Si ya no vive en la <?php echo $direccion?>,<br> o ya no trabaja en la empresa <?php echo $nom_empresa?><br>contacte con: <br>  <a href="administracion@asdete.com"> administración. administracion@asdete.com</a> </td>
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
                      if (mysqli_num_rows($empresas) == 0) {
                      } else {
                        foreach($empresas as $fila_option){
                    ?>
                    <option  value="<?php echo $fila_option['id'] ?>"><?php echo $fila_option['nombre'] ?></option>
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
    <footer class="pie"><?php include "pie.php" ?></footer>
    

</body>
</html>


