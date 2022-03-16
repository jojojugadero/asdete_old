<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>
<!DOCTYPE html>
<html lang="es">
<?php

include $incRoot.'MVC_TOCAR/MODELO/datos.php';


//Iniciamos sesión
session_start();

//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['personal_sesion']) == 'personal_sesion') {
    //$url1 = $dirRoot."MVC_TOCAR\VISTA\ADMINISTRADORES\appAdmin.php";
    //header('Location: '.$url1);
  } else {
    $url2 =$dirRoot."MVC_TOCAR/VISTA/index.php";
    header('Location: '.$url2);
  }

  //Recogemos las variables cuando insertamos nuevos registros, modificamos o eliminamos
  $id =  isset($_POST['id']) ? $_POST['id'] : '';
  $nif =  isset($_POST['nif']) ? $_POST['nif'] : '';
  $password =  isset($_POST['password']) ? $_POST['password'] : '';
  $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
  $ape1 =  isset($_POST['ape1']) ? $_POST['ape1'] : '';
  $ape2 =  isset($_POST['ape2']) ? $_POST['ape2'] : '';
  $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : '';
  $email =  isset($_POST['email']) ? $_POST['email'] : '';
  $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
  $id_empresa =  isset($_POST['empresa']) ? $_POST['empresa'] : '';
  
  //Recogemos variables para la acción que va a hacer el botón en el onclick
  $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
  $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
  $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
  $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';

  //Recogemos el valor de las variables para realizar las operaciones de base de datos
  $datos['id'] = $id;
  $datos['nif'] = $nif;
  $datos['password'] = $password;
  $datos['nombre'] = $nombre;
  $datos['apellido1'] = $ape1;
  $datos['apellido2'] = $ape2;
  $datos['telefono'] = $telefono;
  $datos['email'] = $email;
  $datos['direccion'] = $direccion;
  $datos['id_empresa_fk'] = $id_empresa;

  //Si vamos a modificar el afiliado se recoge el afiliado por ID para su modificación
  $afil_modi = $swmodificar == 'S' ? getAfiliado($id) : $datos;

  //Se comprueba el tipo de acción para dar de alta modificar o eliminar el afiliado
  $msgValidacion = "";
  if($swinsertar == 'S' || $swmodificarapply == 'S') {
    if(trim($nif) == '') {
      $msgValidacion = "El NIF es obligatorio";
    } else if(trim($password) == '') {
      $msgValidacion = "La contraseña es obligatoria";
    } else if(trim($nombre) == '') {
      $msgValidacion = "El nombre es obligatorio";
    } else if(trim($ape1) == '') {
      $msgValidacion = "El apellido 1 es obligatorio";
    } else if(trim($ape2) == '') {
      $msgValidacion = "El apellido 2 es obligatorio";
    } else if(trim($telefono) == '') {
      $msgValidacion = "El teléfono es obligatorio";
    } else if(trim($email) == '') {
      $msgValidacion = "El email es obligatorio";
    } else if(trim($direccion) == '') {
      $msgValidacion = "La dirección es obligatorio";
    } else if(trim($id_empresa) == '') {
      $msgValidacion = "La empresa es obligatorio";
    }
    if(trim($nif) != '') {
      $afil_exist = getAfiliadoNIF($nif);
      $id_exist = isset($afil_exist['id']) ? $afil_exist['id'] : '';
      if($id_exist > 0 && $id != $id_exist) {
        $msgValidacion = "Ya existe un afiliado con ese NIF.";
      }
    }
    if(trim($msgValidacion) != "") {
      $afil_modi = $datos;
    }
  }
  if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
    $swmodificar = "N";
  }
  if(trim($msgValidacion) == "") {
    if($swinsertar == 'S') {
      altaAfiliado($datos);
    } else if($swmodificarapply == 'S') {
      modAfiliado($datos);
    } else if($sweliminar == 'S') {
      eliminarAfiliado($id);
    }
  }

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = getAfiliados();
  $empresas = getEmpresas();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>MVC_TOCAR/VISTA/ESTILOS/estilos.css">
    <script type="text/javascript">
      
      function validacion() {
      <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
      }
    </script>
</head>
<body class="cuerpo_contenedor" onload="validacion();" >


    <header class="cabecera">
      <?php include $incRoot."MVC_TOCAR/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

                <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
                <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

                    <?php include $incRoot."MVC_TOCAR/VISTA/VI_INCLUDES/nav.php" ?>

            </nav>

            <aside class="barra"><p style="font-size:large;">Contactos</p>

            <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
            
                      <?php include $incRoot."MVC_TOCAR/VISTA/VI_INCLUDES/nav.php" ?>

            </aside>


    <article class="skynet">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="<?php echo $dirRoot; ?>MVC_TOCAR/VISTA/index.php">Indice</a> > <a href="<?php echo $dirRoot; ?>MVC_TOCAR/VISTA/VI_ADMINISTRADORES/adminLogin.php">Login</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>MVC_TOCAR/VISTA/VI_AFILIADOS/appAfiliados.php" method="post">
  
  <table class="estilo_tabla" width="50%" align="center" >
    <tr class="estilo_cab_tabla">
      <th class="subtitulo" colspan="12"><h1><span >Gestión de afiliados</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla" >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">NIF</td>
      <td class="primera_fila">Password</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido 1</td>
      <td class="primera_fila">Apellido 2</td>
      <td class="primera_fila">Teléfono</td>
      <td class="primera_fila">Email</td>
      <td class="primera_fila">Dirección</td>
      <td class="primera_fila">Empresa</td>
      <td class="primera_fila">Modificar</td>
      <td class="primera_fila">Eliminar</td>
    </tr> 
   
    <?php
      //Comprobamos si hay registros
        if (mysqli_num_rows($afiliados) == 0) {
          echo '<tr>\n
              <td colspan="11">No se han encontrado afiliados</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($afiliados as $fila){
            $empresa = getEmpresa($fila['id_empresa_fk']);
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila['id'] ?></td>
          <td><?php echo $fila['nif'] ?></td>
          <td><?php echo $fila['password'] ?></td>
          <td><?php echo $fila['nombre'] ?></td>
          <td><?php echo $fila['apellido1'] ?></td>
          <td><?php echo $fila['apellido2'] ?></td>
          <td><?php echo $fila['telefono'] ?></td>
          <td><?php echo $fila['email'] ?></td>
          <td><?php echo $fila['direccion'] ?></td>
          <td><?php echo $empresa['nombre'] ?></td>
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
	    <td><?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['id']:''; ?></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['nif']:''; ?>" type='text' name='nif' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['password']:''; ?>" type='text' name='password' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['nombre']:''; ?>" type='text' name='nombre' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['apellido1']:''; ?>" type='text' name='ape1' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['apellido2']:''; ?>" type='text' name='ape2' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['telefono']:''; ?>" type='text' name='telefono' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['email']:''; ?>" type='text' name='email' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar == 'S' || trim($msgValidacion) != "" ? $afil_modi['direccion']:''; ?>" type='text' name='direccion' size='10' class='centrado'></td>
      <td>
      <!––En este select recogemos las empresa de base de datos para selecionarlas si insertamos o modificamos ––>
        <select name='empresa' class='centrado'>
          <option value="">Seleccionar</option>
          <?php
              if (mysqli_num_rows($empresas) == 0) {
              } else {
                foreach($empresas as $fila_option){

            ?>
            <option 
            <?php 

              if(($swmodificar == 'S' || trim($msgValidacion) != "") && $fila_option['id'] == $afil_modi['id_empresa_fk']) {
                echo "selected='selected'";
              } 
            ?> value="<?php echo $fila_option['id'] ?>"><?php echo $fila_option['nombre'] ?></option>
            <?php
              }
            }
            ?>
        </select>
      </td>
      <td class='bot' colspan="2">
        <?php
          if ($swmodificar) {
        ?>
         <!––Botones con las operaciones para confirmar la modificacion o crear un registro nuevo en javascript ––>
          <input type='submit' onclick="document.getElementById('swmodificarapply').value = 'S';document.getElementById('swmodificar').value = 'S';" name='cr' id='cr' value='Modificar'>
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
  <input value="<?php echo $swmodificar != 'S' ? '' : $afil_modi['id']; ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie"><?php include $incRoot."MVC_TOCAR/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


