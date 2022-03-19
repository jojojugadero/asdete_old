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
include $incRoot.'POO/MODELO/administrador.php';


//Iniciamos sesión
session_start();

include $incRoot.'POO/CONTROLADOR/CO_SUPERADMIN/appSuperAdmin.php';

$dat = new Datos();
$admi = new Administrador();

$admi->loadPost();


$swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
$swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
$swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
$sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';


$admin_modi = $swmodificar == 'S' ? Administrador::getAdministradorId($admi->getId()) : $admi;

$msgValidacion = $swinsertar == 'S' || $swmodificarapply == 'S' ? $admi->validar() : '';



if(trim($msgValidacion) != "") {
  $admin_modi = $admi;
}
if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
  $swmodificar = "N";
}
if(trim($msgValidacion) == "") {
  if($swinsertar == 'S') {
    $dat->altaAdmin($admi->getDatos());
  } else if($swmodificarapply == 'S') {
    $dat->modAdmin($admi->getDatos());
  } else if($sweliminar == 'S') {
    $dat->eliminarAdmin($admi->getId());
  }
}

$mostrarDatos = $swmodificar == 'S' || trim($msgValidacion) != "" ? 'S':'N';

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = Afiliados::getAfiliados();
  $administradores = Administrador::getAdministradores();

?>

<body class="cuerpo_contenedor" >


  <!––Incluimos la cabecera ––>
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
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/superAdminLogin.php">Login</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/appSuperAdminMenu.php">Menú</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/appSuperAdminAdministradores.php" method="post">
  
  <table class="estilo_tabla" width="50%" align="center" >
    <tr class="estilo_cab_tabla">
      <th class="subtitulo" colspan="12"><h1><span >Gestión de administradores</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla" >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nick</td>
      <td class="primera_fila">Password</td>
      <td class="primera_fila">Email</td>
      <td class="primera_fila">Modificar</td>
      <td class="primera_fila">Eliminar</td>
    </tr> 
   
    <?php
      //Comprobamos si hay registros
        if (count($administradores) == 0) {
          echo '<tr>\n
              <td colspan="11">No se han encontrado empresas</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($administradores as $fila){
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila->getId()?></td>
          <td><?php echo $fila->getNickname() ?></td>
          <td><?php echo $fila->getPassword() ?></td>
          <td><?php echo $fila->getEmail() ?></td>
          <!––Botones con las operaciones a seleccionar en javascript de modificar o borrar un registro existente ––>
          <td class="bot"><input onclick="document.getElementById('swmodificar').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='up' id='up' value='Actualizar'></td>
          <td class='bot'><input onclick="document.getElementById('sweliminar').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='del' id='del' value='Borrar'></td>
        </tr>   
    <?php
          }
      }
    ?>
    <!––Mostramos los campos para insertar o modificar registros ––>
    <tr class="estilo_bottom_tabla" >
	    <td><?php echo $mostrarDatos == 'S' ?  $admin_modi->getId():''; ?></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getNickname():'';?>" type='text' name='nickname' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getPassword():''; ?>" type='text' name='password' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getEmail():'';?>" type='text' name='email' size='10' class='centrado'></td>
      <td class='bot' colspan="2">
        <?php
          if ($swmodificar) {
        ?>
         <!––Botones con las operaciones para confirmar la modificacion o crear un registro nuevo en javascript ––>
          <input type='submit' onclick="document.getElementById('swmodificarapply').value = 'S'" name='cr' id='cr' value='Modificar'>
          <input type='submit' onclick="" name='cr' id='cr' value='Nuevo'>
        <?php
          } else {
        ?>
         <!––Botones con las operación de crear un nuevo registo en javascript ––>
          <input type='submit' onclick="document.getElementById('swinsertar').value = 'S'" name='cr' id='cr' value='Insertar'>
        <?php
          }
        ?>
      </td>
    </tr>    
  </table>

  <!––Camos ocultos (HIDDEN) para mandar las acciones a realizar ––>
  <input value="<?php echo $mostrarDatos == 'S' ? $admin_modi->getId():''; ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>
    

</body>
</html>

