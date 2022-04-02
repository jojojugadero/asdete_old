<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>
<!DOCTYPE html>
<html lang="es">
<?php
include $incRoot.'POO/MODELO/MO_ADMINISTRADORES/includesAdmin.php';

include $incRoot.'POO/CONTROLADOR/CO_ADMINISTRADORES/appAdministra.php';

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <script type="text/javascript">
      
      function validacion() {
      <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
      }
    </script>
</head>
<body class="cuerpo_contenedor" onload="validacion();" >


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
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=admin">Indice</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>POO/VISTA/VI_AFILIADOS/appAfiliados.php" method="post">
  
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
        if (count($afiliados) == 0) {
          echo '<tr>\n
              <td colspan="11">No se han encontrado afiliados</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($afiliados as $fila){
            $empresa = Empresa::getEmpresaId($fila->getIdEmpresa());
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila->getId() ?></td>
          <td><?php echo $fila->getNif() ?></td>
          <td><?php echo $fila->getPassword() ?></td>
          <td><?php echo $fila->getNombre() ?></td>
          <td><?php echo $fila->getApellido1() ?></td>
          <td><?php echo $fila->getApellido2() ?></td>
          <td><?php echo $fila->getTelefono() ?></td>
          <td><?php echo $fila->getEmail() ?></td>
          <td><?php echo $fila->getDireccion() ?></td>
          <td><?php echo $empresa->getNombre() ?></td>
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
	    <td><?php echo $mostrarDatos == 'S' ? $afil_modi->getId():''; ?></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getNif():''; ?>" type='text' name='nif' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getPassword():''; ?>" type='text' name='password' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getNombre():''; ?>" type='text' name='nombre' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getApellido1():''; ?>" type='text' name='ape1' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getApellido2():''; ?>" type='text' name='ape2' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getTelefono():''; ?>" type='text' name='telefono' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getEmail():''; ?>" type='text' name='email' size='10' class='centrado'></td>
      <td><input value="<?php echo $mostrarDatos == 'S' ? $afil_modi->getDireccion():''; ?>" type='text' name='direccion' size='10' class='centrado'></td>
      <td>
      <!––En este select recogemos las empresa de base de datos para selecionarlas si insertamos o modificamos ––>
        <select name='empresa' class='centrado'>
          <option value="">Seleccionar</option>
          <?php
              if (count($empresas) == 0) {
              } else {
                foreach($empresas as $fila_option){

            ?>
            <option 
            <?php 

              if(($mostrarDatos == 'S') && $fila_option->getId() == $afil_modi->getIdEmpresa()) {
                echo "selected='selected'";
              } 
            ?> value="<?php echo $fila_option->getId() ?>"><?php echo $fila_option->getNombre() ?></option>
            <?php
              }
            }
            ?>
        </select>
      </td>
      <td class='bot' colspan="2">
        <?php
          if ($swmodificar == 'S') {
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
  <input value="<?php echo $swmodificar != 'S' ? '' : $afil_modi->getId(); ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie"><?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


