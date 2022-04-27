<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;


include $incRoot.'POO/MODELO/MO_SUPERADMIN/includesSuperAdmin.php';

include $incRoot.'POO/CONTROLADOR/CO_SUPERADMIN/appSuperAdminAdministradores.php';
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
 <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
      /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT*/
      function validacion() {
      <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
      }
      /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT nuevo registro*/
      function nuevoReg() {
        return true;
      }
      /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT alta registro*/
      function altaReg() {
        document.getElementById('swinsertar').value = 'S';
        return true;
      }
       /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT para modificar registro*/
      function modReg(id) {
        document.getElementById('swmodificar').value = 'S';
        document.getElementById('id').value = id;
        return true;
      }
      /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT (Método confirm) para aplicar la modificación del registro*/
      function applyModReg() {
        var c = confirm("¿Estas seguro de querer modificar este registro?");
        if(!c) {
          return false;
        }
        document.getElementById('swmodificarapply').value = 'S';
        document.getElementById('swmodificar').value = 'S';
        return true;
      }
      /*Validaciones para nuestro "CRUD" de superAdministradores en JAVASCRIPT para aplicar eliminación del registro*/
      function delReg(id) {
        var c = confirm("¿Estas seguro de querer eliminar este registro?");
        if(!c) {
          return false;
        }
        document.getElementById('sweliminar').value = 'S';
        document.getElementById('id').value = id;
        return true;
      }
    </script>
</head>

<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>" onload="validacion();" >


  <!--Incluimos la cabecera -->
    <header class="cabecera<?php echo $sufijo_estilo; ?>">
        <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

          <!--En la parte izquierda (NAV) seleccionamos las empresas de una lista en HTML dentro del "INCLUDE" -->
<nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Empresas del sector</p>

        <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

 </nav>
  <!--En la parte derecha (ASIDE) ponemos los contactos de la web con una lista en HTML dentro del "INCLUDE" -->

 <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>


        <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

 </aside>

    <!--En la parte central mostraremos los registros y segun la sesión mostraremos un estilo u otro-->
    <article class="skynet<?php echo $sufijo_estilo; ?>">
    <!--Migas de pan (breadcrumbs) -->
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=sadmin">Indice</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/vistaSuperAdminMenu.php">Menú</a>
    
    <!--Formulario para realizar todas las operaciones de base de datos-->
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>POO/VISTA/VI_SUPERADMIN/vistaSuperAdminAdministradores.php" method="post">
  
<!--Cabecera de nuestra tabla-->
  <table class="estilo_tabla" width="80%" align="center" >
    <tr class="estilo_cab_tabla<?php echo $sufijo_estilo; ?>">
      <th class="subtitulo" colspan="6"><h1><span >Gestión de administradores</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla<?php echo $sufijo_estilo; ?>" >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nick</td>
      <td class="primera_fila">Password</td>
      <td class="primera_fila">Email</td>
      <td class="primera_fila">Modificar</td>
      <td class="primera_fila">Eliminar</td>
    </tr> 
   
    <?php
      /*Comprobamos si hay registros y de no haber mostramos el estilo "estilo_noresultados_tabla" utilizamos 
      la variable  "$administradores" proveniente de la clase appSuperAdminAdministradores.php*/
        if (count($administradores) == 0) {
          echo '<tr>
              <td class="estilo_noresultados_tabla" colspan="6">No se han encontrado administradores</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($administradores as $fila){
            //Con este operador ternario damos estilo a cada de las lineas del formulario 
            //"estilo_fila1_tabla" y "estilo_fila2_tabla" haciendo el efecto "Pijama"
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!--Mostramos los registros de base de datos recorridos por el foreach -->
      <!--Con la variable "$fila" utilizamos los metodos de tipo "administradores" -->
     
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila->getId()?></td>
          <td><?php echo $fila->getNickname() ?></td>
          <td><?php echo $fila->getPassword() ?></td>
          <td><?php echo $fila->getEmail() ?></td>
          <!--Botones con las operaciones a seleccionar en javascript de modificar o borrar un registro existente -->
          <td class="celda-campo"><input class="btn btn-primary btn-sm" onclick="modReg('<?php echo $fila->getId() ?>');" type='submit' name='up' id='up' value='Actualizar'></td>
          <td class='bot'><input class="btn btn-danger btn-sm" onclick="delReg('<?php echo $fila->getId() ?>');" type='submit' name='del' id='del' value='Borrar'></td>
        </tr>   
    <?php
          }
      }
    ?>
    <!--Mostramos los campos para  modificar registros -->
    <tr class="estilo_bottom_tabla" >
	    <td class="celda-campo ultima_fila"><?php echo $mostrarDatos == 'S' ?  $admin_modi->getId():''; ?></td>
      <td class="celda-campo ultima_fila"><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getNickname():'';?>" type='text' name='nickname' size='10' class='centrado'></td>
      <td class="celda-campo ultima_fila"><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getPassword():''; ?>" type='text' name='password' size='10' class='centrado'></td>
      <td class="celda-campo ultima_fila"><input value="<?php echo $mostrarDatos == 'S' ?  $admin_modi->getEmail():'';?>" type='text' name='email' size='10' class='centrado'></td>
      <td class='bot' colspan="2">
        <?php
          if ($swmodificar == 'S') {
        ?>
         <!--Botones con las operaciones para confirmar la modificacion o crear un registro nuevo en javascript -->
          <input class="btn btn-success btn-sm" type='submit' onclick="applyModReg();" name='cr' id='cr' value='Modificar'>
          <input class="btn btn-warning btn-sm" type='submit' onclick="nuevoReg();" name='cr' id='cr' value='Nuevo'>
        <?php
          } else {
        ?>
         <!--Botones con las operación de crear un nuevo registo en javascript -->
          <input class="btn btn-success btn-sm" type='submit' onclick="altaReg();" name='cr' id='cr' value='Insertar'>
        <?php
          }
        ?>
      </td>
    </tr>    
  </table>

  <!--Camos ocultos (HIDDEN) para mandar las acciones a realizar -->
  <input value="<?php echo $mostrarDatos == 'S' ? $admin_modi->getId():''; ?>" name="id" id="id" type="hidden" />
  <input value="" name="swinsertar" id="swinsertar" type="hidden" />
  <input value="" name="swmodificar" id="swmodificar" type="hidden" />
  <input value="" name="swmodificarapply" id="swmodificarapply" type="hidden" />
  <input value="" name="sweliminar" id="sweliminar" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>

    <!--Footer con su "INCLUDE" -->
    <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>
    

</body>
</html>

