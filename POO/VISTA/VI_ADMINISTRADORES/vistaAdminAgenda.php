<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
include $incRoot.'POO/MODELO/MO_ADMINISTRADORES/includesAdmin.php';

include $incRoot.'POO/CONTROLADOR/CO_ADMINISTRADORES/appAdministraAgenda.php';


include $incRoot."POO/CONTROLADOR/ControlEstilos.php";

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      
      function validacion() {
      <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
      }
    </script>
</head>
<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>" onload="validacion();" >


    <header class="cabecera<?php echo $sufijo_estilo; ?>">
      <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
    </header>

      
                <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
                <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Empresas del sector</p>

                    <?php include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

            </nav>

            <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

            <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
            
                <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>
            </aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">
    <!––Migas de pan (breadcrumbs) ––>
    <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=admin">Indice</a> > <a href="<?php echo $dirRoot; ?>POO/VISTA/VI_ADMINISTRADORES/vistaAdminMenu.php">Menú</a>
    
    <!––Formulario para realizar todas las operaciones de base de datos––>
<form name="formTabla" id="formTabla" href="<?php echo $dirRoot; ?>POO/VISTA/VI_AFILIADOS/appAfiliado.php" method="post">
  
  <table class="estilo_tabla" width="90%" align="center" >
    <tr class="estilo_cab_tabla">
      <th class="subtitulo" colspan="13"><h1><span >Solicitudes de modificación de datos de afiliados</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla" >
      <td class="primera_fila"></td>
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
      <td class="primera_fila">Aceptar</td>
      <td class="primera_fila">Rechazar</td>
    </tr> 
   
    <?php
      //Comprobamos si hay registros
        if (count($sol_afil) == 0) {
          echo '<tr>
              <td class="estilo_noresultados_tabla" colspan="13">No se han encontrado solicitudes</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($sol_afil as $fila){
            $empresa = Empresa::getEmpresaId($fila->getIdEmpresa());
            $afiliado = Afiliados::getAfiliadoId($fila->getIdAfiliado());
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td>Datos antigüos</td>
          <td><?php echo $afiliado->getId() ?></td>
          <td><?php echo $afiliado->getNif() ?></td>
          <td><?php echo $afiliado->getPassword() ?></td>
          <td><?php echo $afiliado->getNombre() ?></td>
          <td><?php echo $afiliado->getApellido1() ?></td>
          <td><?php echo $afiliado->getApellido2() ?></td>
          <td><?php echo $afiliado->getTelefono() ?></td>
          <td><?php echo $afiliado->getEmail() ?></td>
          <td><?php echo $afiliado->getDireccion() ?></td>
          <td><?php echo $empresa->getNombre() ?></td>
          <!––Botones con las operaciones a seleccionar en javascript de modificar o borrar un registro existente ––>
          <td class="bot"></td>
          <td class='bot'></td>
        </tr>   
        <tr class="<?php echo $color_fila;?>" >
          <td>Datos nuevos</td>
          <td><?php echo $fila->getIdAfiliado() ?></td>
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
          <td class="bot"><input class="btn btn-primary btn-sm" onclick="document.getElementById('swaceptar_solafil').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='up' id='up' value='Aceptar'></td>
          <td class='bot'><input class="btn btn-danger btn-sm" onclick="document.getElementById('swrechazar_solafil').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='del' id='del' value='Rechazar'></td>
        </tr>   
    <?php
          }
      }
    ?>
  </table>

  <table class="estilo_tabla" width="90%" align="center" >
    <tr class="estilo_cab_tabla">
      <th class="subtitulo" colspan="7"><h1><span >Solicitudes de prestamos</span></h1></th>
    </tr>
    <tr class="estilo_subcab_tabla" >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Afiliado</td>
      <td class="primera_fila">Motivo</td>
      <td class="primera_fila">Cantidad</td>
      <td class="primera_fila">Estado</td>
      <td class="primera_fila">Aceptar</td>
      <td class="primera_fila">Rechazar</td>
    </tr> 
   
    <?php
      //Comprobamos si hay registros
        if (count($sol_pres) == 0) {
          echo '<tr>
              <td class="estilo_noresultados_tabla" colspan="7">No se han encontrado solicitudes</td>
             </tr>';
        } else {
          $num = 0;
          //Si hay registros se recorren para mostar las filas
          foreach($sol_pres as $fila){
            $afiliado = Afiliados::getAfiliadoId($fila->getIdAfiliado());
            //Con este operador ternario damos estilo a cada de las lineas del formulario
            $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
            $num++;
      ?>
		  <!––Mostramos los registros de base de datos ––>
        <tr class="<?php echo $color_fila;?>" >
          <td><?php echo $fila->getId() ?></td>
          <td><?php echo $afiliado->getNif() ?> - <?php echo $afiliado->getNombre() ?></td>
          <td><?php echo $fila->getMotivo() ?></td>
          <td><?php echo $fila->getCantidad() ?></td>
          <td><?php echo $fila->getEstado() ?></td>
          <!––Botones con las operaciones a seleccionar en javascript de modificar o borrar un registro existente ––>
          <?php if ($fila->getEstado() == 'Pendiente') { ?>
            <td class="bot"><input class="btn btn-primary btn-sm" onclick="document.getElementById('swaceptar_solpres').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='up' id='up' value='Aceptar'></td>
            <td class='bot'><input class="btn btn-danger btn-sm" onclick="document.getElementById('swrechazar_solpres').value = 'S';document.getElementById('id').value = <?php echo $fila->getId() ?>;" type='submit' name='del' id='del' value='Rechazar'></td>
          <?php } else { ?>
            <td class="bot"></td>
            <td class='bot'></td>
          <?php } ?>
        </tr>   
    <?php
          }
      }
    ?>
  </table>

  <!––Camos ocultos (HIDDEN) para mandar las acciones a realizar ––>
  <input value="" name="id" id="id" type="hidden" />
  <input value="" name="swaceptar_solafil" id="swaceptar_solafil" type="hidden" />
  <input value="" name="swrechazar_solafil" id="swrechazar_solafil" type="hidden" />
  <input value="" name="swaceptar_solpres" id="swaceptar_solpres" type="hidden" />
  <input value="" name="swrechazar_solpres" id="swrechazar_solpres" type="hidden" />
  <p>&nbsp;</p>
</form>
    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"><?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


