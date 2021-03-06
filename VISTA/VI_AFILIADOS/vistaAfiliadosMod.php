<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

?>
<?php

include $incRoot.'MODELO/MO_AFILIADOS/includesAfiliados.php';
include $incRoot.'CONTROLADOR/CO_AFILIADOS/appAfiliadoMod.php';
include $incRoot."CONTROLADOR/ControlEstilos.php";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
 <link rel="stylesheet" href="<?php echo $dirRoot; ?>VISTA/ESTILOS/estilos.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

      /*Muestra mensaje de validación para nuestro "CRUD" de superAdministradores en JAVASCRIPT según se haya cáculado*/
      function validacion() {
      <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
      }
      /*Método con confirmación para nuestro "CRUD" de afiliados en JAVASCRIPT para enviar la solicitud.
        Esto envia la solicitud de modificación de datos del afiliado.*/
      function enviarSol() {
        var c = confirm("¿Estas seguro de querer enviar la solicitud de modificación?");
        if(!c) {
          return false;
        }
        document.getElementById('swinsertar').value = 'S';
        return true;
      }
    </script>
</head>
<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>" onload="validacion();" >


    <header class="cabecera<?php echo $sufijo_estilo; ?>">
    <?php include $incRoot."VISTA/VI_INCLUDES/cabecera.php" ?>
    
    </header>

              <!--En la parte izquierda seleccionamos las empresas de una lista en HTML -->
              <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Empresas del sector</p>

              <?php include $incRoot."VISTA/VI_INCLUDES/nav.php" ?>

          </nav>



          <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

                 <!--En la parte derecha ponemos los contactos de la web con una lista en HTML -->
                 <?php include $incRoot."VISTA/VI_INCLUDES/aside.php" ?>

          </aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">
    <!--Migas de pan (breadcrumbs) -->
    
    <a href="<?php echo $dirRoot; ?>VISTA/index.php?tipologin=afil">Indice</a> > <a href="<?php echo $dirRoot?>VISTA/VI_AFILIADOS/vistaAfiliados.php">Afiliados</a>
    <!--Mostramos el nombre del afiliado con un saludo y con sus datos y si no son correctos le dejamos un link para escriba a administración y modifique sus datos -->

    <form name="formTabla" id="formTabla" action="<?php echo $dirRoot; ?>VISTA/VI_AFILIADOS/vistaAfiliadosMod.php" method="post">

          <table class="estilo_tabla" width="90%" align="center" >
            <tr class="estilo_cab_tabla<?php echo $sufijo_estilo; ?>">
              <th class="subtitulo" colspan="12"><h1><span >Solicitud de modificación</span></h1></th>
            </tr>
            <!--Cabecera de nuestra tabla-->
            <tr class="estilo_subcab_tabla<?php echo $sufijo_estilo; ?>" >
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
              <td class="primera_fila">Enviar solicitud</td>
            </tr> 
          
            <!--Mostramos los campos para modificar y enviar la solicitud -->
            <tr class="estilo_bottom_tabla" >
              <td class="celda-campo ultima_fila">
                <?php echo  $afiliado->getId(); ?>
                <input value="<?php echo $afiliado->getId(); ?>" type='hidden' name='id_afiliados_fk' size='10' class='centrado'>
              </td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getNif(); ?>" type='text' name='nif' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getPassword(); ?>" type='text' name='password' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getNombre(); ?>" type='text' name='nombre' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getApellido1(); ?>" type='text' name='ape1' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getApellido2(); ?>" type='text' name='ape2' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getTelefono(); ?>" type='text' name='telefono' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getEmail(); ?>" type='text' name='email' size='10' class='centrado'></td>
              <td class="celda-campo ultima_fila"><input value="<?php echo $afiliado->getDireccion(); ?>" type='text' name='direccion' size='10' class='centrado'></td>
              <td>
              <!--En este select recogemos las empresa de base de datos para selecionarlas si insertamos o modificamos -->
                <select name='empresa' class='centrado'>
                  <option value="">Seleccionar</option>
                  <?php
                    /*En este select mostramos las empresas con 
                      el método de la clase Empresas, getEmpresas(), 
                      lllamado en la clase appAfiliadoMod*/
                      if (count($empresas) == 0) {
                      } else {
                        foreach($empresas as $fila_option){
                    ?>
                    <option 
                    <?php 
                        //Si el afiliado tiene la empresa que sale del foreach la selecciona
                      if($fila_option->getId() == $afiliado->getIdEmpresa()) {
                        echo "selected='selected'";
                      } 
                      //Muestra opción de select con nombre de empresa y con valor su ID
                    ?> value="<?php echo $fila_option->getId() ?>"><?php echo $fila_option->getNombre() ?></option>
                    <?php
                      }
                    }
                    ?>
                </select>
              </td>
              <td class='bot' colspan="2">
                <!--Botones con las operación de enviar una nueva solicitud en javascript -->
                  <input class="btn btn-success btn-sm" type='submit' onclick="enviarSol();" name='cr' id='cr' value='Enviar solicitud'>
              </td>
            </tr>    
          </table>
          <!--Camos ocultos (HIDDEN) para mandar las acciones a realizar en el submit cuando realizamos una acción -->
          <input value="" name="swinsertar" id="swinsertar" type="hidden" />

        <p>&nbsp;</p>
      </form>
      </div>
    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"><?php include $incRoot."VISTA/VI_INCLUDES/pie.php" ?></footer>
    

</body>
</html>


