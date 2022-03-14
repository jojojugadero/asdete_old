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
    <link rel="stylesheet" href="..\ESTILOS\estilos.css">
</head>
<?php

include $incRoot.'MVC_TOCAR/MODELO/datos.php';


//Iniciamos sesión
session_start();

//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['superadmin_session']) == 'superadmin_session') {
    //$url1 ="appPersonal.php";
    //header('Location: '.$url1);
  } else {
    $url2 = $dirRoot.'MVC_TOCAR/VISTA/index.php';
    header('Location: '.$url2);
  }

  //Recogemos las variables cuando insertamos nuevos registros, modificamos o eliminamos
  $id =  isset($_POST['id']) ? $_POST['id'] : '';
  $cif =  isset($_POST['cif']) ? $_POST['cif'] : '';
  $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
  $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : '';
  $email =  isset($_POST['email']) ? $_POST['email'] : '';
  $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
 
  
  //Recogemos variables para la acción que va a hacer el botón en el onclick
  $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
  $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
  $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
  $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';

  //Recogemos el valor de las variables para realizar las operaciones de base de datos
  $datos['id'] = $id;
  $datos['cif'] = $cif;
  $datos['nombre'] = $nombre;
  $datos['telefono'] = $telefono;
  $datos['email'] = $email;
  $datos['direccion'] = $direccion;

  //Se comprueba el tipo de acción para dar de alta modificar o eliminar la empresa
  if($swinsertar == 'S') {
    altaEmpresa($datos);
  } else if($swmodificarapply == 'S') {
    modEmpresa($datos);
  } else if($sweliminar == 'S') {
    eliminarEmpresa($id);
  }

  //Recogemos todos los administradores para mostarlos por pantalla
  $afiliados = getAfiliados();
  $empresas = getAdministradores($id);

  //Si vamos a modificar la empresa se recoge la empresa por ID para su modificación
  $empr_modi = $swmodificar == 'S' ? getAdministradorId($id) : '';
?>

<body class="cuerpo_contenedor" >


  <!––Incluimos la cabecera ––>
    <header class="cabecera">
        <?php include $incRoot."MVC_TOCAR/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

          <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
        <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

                   <?php include $incRoot."MVC_TOCAR\VISTA\INCLUDES\nav.php" ?>

      </nav>


              <aside class="barra"><p style="font-size:large;">Contactos</p>

              <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                          <?php include $incRoot."MVC_TOCAR\VISTA\INCLUDES\nav.php" ?>

              </aside>


    <article class="skynet">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="<?php echo $dirRoot; ?>MVC_TOCAR\VISTA\index.php">Indice</a> > <a href="<?php echo $dirRoot; ?>MVC_TOCAR\VISTA\VI_ADMINISTRADORES\superAdminLogin.php">Login</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>MVC_TOCAR\VISTA\VI_ADMINISTRADORES\appSuperAdminAdministradores.php" method="post">
  
  <table class="estilo_tabla" width="50%" align="center" >
    <tr class="estilo_cab_tabla">
      <th class="subtitulo" colspan="12"><h1><span >Gestión de empresas</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla" >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">CIF</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Teléfono</td>
      <td class="primera_fila">Email</td>
      <td class="primera_fila">Dirección</td>
      <td class="primera_fila">Modificar</td>
      <td class="primera_fila">Eliminar</td>
    </tr> 
   
    <?php
      //Comprobamos si hay registros
        if (mysqli_num_rows($empresas) == 0) {
          echo '<tr>\n
              <td colspan="11">No se han encontrado empresas</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($empresas as $fila){
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila['id'] ?></td>
          <td><?php echo $fila['cif'] ?></td>
          <td><?php echo $fila['nombre'] ?></td>
          <td><?php echo $fila['telefono'] ?></td>
          <td><?php echo $fila['email'] ?></td>
          <td><?php echo $fila['direccion'] ?></td>
          <!––Botones con las operaciones a seleccionar en javascript de modificar o borrar un registro existente ––>
          <td class="bot"><input onclick="document.getElementById('swmodificar').value = 'S';document.getElementById('id').value = <?php echo $fila['id'] ?>;" type='submit' name='up' id='up' value='Actualizar'></td>
          <td class='bot'><input onclick="document.getElementById('sweliminar').value = 'S';document.getElementById('id').value = <?php echo $fila['id'] ?>;" type='submit' name='del' id='del' value='Borrar'></td>
        </tr>   
    <?php
          }
      }
    ?>
    <!––Mostramos los campos para insertar o modificar registros ––>
    <tr class="estilo_bottom_tabla" >
	    <td><?php echo $swmodificar != 'S' ? '' : $empr_modi['id']; ?></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$empr_modi['cif']; ?>" type='text' name='cif' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$empr_modi['nombre']; ?>" type='text' name='nombre' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$empr_modi['telefono']; ?>" type='text' name='telefono' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$empr_modi['email']; ?>" type='text' name='email' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$empr_modi['direccion']; ?>" type='text' name='direccion' size='10' class='centrado'></td>
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
  <input value="<?php echo $swmodificar != 'S' ? '' : $empr_modi['id']; ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie"> <?php include $incRoot."MVC_TOCAR\VISTA\VI_INCLUDES\pie.php" ?></footer>
    

</body>
</html>

