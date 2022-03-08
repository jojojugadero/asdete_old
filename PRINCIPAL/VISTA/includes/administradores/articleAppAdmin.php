<?php

echo "


      
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
</form>";



?>