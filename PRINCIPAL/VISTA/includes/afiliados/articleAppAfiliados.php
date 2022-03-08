<?php

 echo "<!––Migas de pan (breadcrumbs) ––>
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
</form>";

?>