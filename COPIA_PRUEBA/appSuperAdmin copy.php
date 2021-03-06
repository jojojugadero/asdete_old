
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilosMatrix.css">
    <script>// Get the canvas node and the drawing context
const canvas = document.getElementById('canvasMatrix');
const ctx = canvas.getContext('2d');

// set the width and height of the canvas
const w = canvas.width = document.body.offsetWidth;
const h = canvas.height = document.body.offsetHeight;

// draw a black rectangle of width and height same as that of the canvas
ctx.fillStyle = '#000';
ctx.fillRect(0, 0, w, h);

const cols = Math.floor(w / 20) + 1;
const ypos = Array(cols).fill(0);

function matrix () {
	// Draw a semitransparent black rectangle on top of previous drawing
	ctx.fillStyle = '#0001';
	ctx.fillRect(0, 0, w, h);

	// Set color to green and font to 15pt monospace in the drawing context
	ctx.fillStyle = '#0f0';
	ctx.font = '20pt monospace';

	// for each column put a random character at the end
	ypos.forEach((y, ind) => {
		// generate a random character
		const text = String.fromCharCode(Math.random() * 122);

		// x coordinate of the column, y coordinate is already given
		const x = ind * 20;
		// render the character at (x, y)
		ctx.fillText(text, x, y);

		// randomly reset the end of the column if it's at least 100px high
		if (y > 100 + Math.random() * 10000) ypos[ind] = 0;
		// otherwise just move the y coordinate for the column 20px down,
		else ypos[ind] = y + 20;
	});
}

// render the animation at 20 FPS.
setInterval(matrix, 50);</script>
</head>
<?php

include 'datos.php';



//Iniciamos sesión
session_start();

//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
/*if(isset($_SESSION['administrador_session']) == 'administrador_session') {
    $url1 ="appSuperAdmin.php";
    //header('Location: '.$url1);
  } else {
    $url2 ="index.php";
    header('Location: '.$url2);
  }*/

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

  //Se comprueba el tipo de acción para dar de alta modificar o eliminar el afiliado
  if($swinsertar == 'S') {
    altaAfiliado($datos);
  } else if($swmodificarapply == 'S') {
    modAfiliado($datos);
  } else if($sweliminar == 'S') {
    eliminarAfiliado($id);
  }

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = getAfiliados();
  $empresas = getEmpresas();

  //Si vamos a modificar el afiliado se recoge el afiliado por ID para su modificación
  $afil_modi = $swmodificar == 'S' ? getAfiliado($id) : '';
?>

<body class="cuerpo_contenedor" >


<canvas id="canvasMatrix"></canvas>

   

  

    <article class="skynet">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="index.php">Indice</a> > <a href="personalLogin.php">Login</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="appPersonal.php" method="post">
  
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
	    <td><?php echo $swmodificar != 'S' ? '' : $afil_modi['id']; ?></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['nif']; ?>" type='text' name='nif' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['password']; ?>" type='text' name='password' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['nombre']; ?>" type='text' name='nombre' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['apellido1']; ?>" type='text' name='ape1' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['apellido2']; ?>" type='text' name='ape2' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['telefono']; ?>" type='text' name='telefono' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['email']; ?>" type='text' name='email' size='10' class='centrado'></td>
      <td><input value="<?php echo $swmodificar != 'S' ? '' :$afil_modi['direccion']; ?>" type='text' name='direccion' size='10' class='centrado'></td>
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

              if($swmodificar == 'S' && $fila_option['id'] == $afil_modi['id_empresa_fk']) {
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
  <input value="<?php echo $swmodificar != 'S' ? '' : $afil_modi['id']; ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
   
    

</body>
</html>


