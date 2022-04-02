<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="VISTA/css/estilos.css">
</head>


<body class="cuerpo_contenedor" >

<?php include "CONTROLADOR\internas\appAdmin.php";?>


    <header class="cabecera">
        <?php llamaCabecera(); ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
            <nav class="navega">

                <?php  navegaAdministradores();?>

   </nav>

     <aside class="barra"><?php

        barraAdministradores();?>

   </aside>


    <article class="skynet">
               <!––Migas de pan (breadcrumbs) ––>
<a href="index.php?tipologin=admin">Indice</a>

<!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="CONTROLADOR\internas\appAdmin.php" method="post">

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

<?php compruebaRegistrosAdmin();?>

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
</form>";

    </article>
    <footer class="pie"><?php include "VISTA/pie.php" ?></footer>
    

</body>
</html>