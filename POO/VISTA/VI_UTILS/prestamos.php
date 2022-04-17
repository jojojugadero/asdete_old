<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

include $incRoot.'POO/MODELO/MO_SUPERADMIN/includesSuperAdmin.php';

include $incRoot.'POO/CONTROLADOR/CO_UTILS/appPrestamos.php';

include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".loan-input").on("keyup", null, function () {
                var $input = $(this),
                    value = $input.val(),
                    num = parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

                $input.siblings('.add-on').text('$' + num);
            });
            <?php echo trim($msgValidacion) == "" ? "": "alert('".$msgValidacion."');"; ?>
        });
        </script>
</head>


<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>">

    <!––Incluimos la cabecera ––>
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
                <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $url_volver; ?>">Volver</a>

                <div class="container">
                    
                <form name="formTabla" id="formTabla" action="<?php echo $dirRoot; ?>POO/VISTA/VI_UTILS/prestamos.php" method="post">

                    <table class="estilo_tabla" width="90%" align="center" >
                    <tr class="estilo_cab_tabla<?php echo $sufijo_estilo; ?>">
                        <th class="subtitulo" colspan="12"><h1><span >Solicitud de prestamos</span></h1></th>
                    </tr>
                    <tr class="estilo_subcab_tabla<?php echo $sufijo_estilo; ?>" >
                        <td class="primera_fila">Afiliado</td>
                        <td class="primera_fila">Motivo</td>
                        <td class="primera_fila">Cantidad *</td>
                        <td class="primera_fila">Enviar solicitud</td>
                    </tr> 

                    <!––Mostramos los campos para insertar o modificar registros ––>
                    <tr class="estilo_bottom_tabla" >
                        <td  class="bot ultima_fila">
                        <!––En este select recogemos las empresa de base de datos para selecionarlas si insertamos o modificamos ––>
                        
                        <?php if ($id_afil != '') {?>
                            <input value="<?php echo $afiliado->getNif() ?> - <?php echo $afiliado->getNombre() ?>" type='text' disabled="disabled">
                            <input value="<?php echo $id_afil; ?>" type='hidden' name='id_afiliados_fk' size='10' class='centrado'>
                        <?php } else { ?>
                            <select name='id_afiliados_fk' class='centrado'>
                                <option value="">Seleccionar</option>
                                <?php
                                    if (count($afiliados) == 0) {
                                    } else {
                                    foreach($afiliados as $fila_option){
                                        
                                ?>
                                <option 
                                <?php 

                                    if($fila_option->getId() == $id_afil) {
                                    echo "selected='selected'";
                                    } 
                                ?> value="<?php echo $fila_option->getId() ?>"><?php echo $fila_option->getNif() ?> - <?php echo $fila_option->getNombre() ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php } ?>
                        </td>
                        <!––Atributos formulario motivo prestamos ––>
                        <td class="bot ultima_fila"><input value="" type='text' name='motivo' size='10' class='centrado'></td>
                        <!––Atributos formulario cantidad prestamos ––>
                        <td class="bot ultima_fila"><input value="" type="number" min="0.00" max="5000.00" step="5.00" name='cantidad' size='10' class='centrado'></td>
                            
                        <td class='bot' colspan="2">
                        <!––Botones con las operación de crear un nuevo registo en javascript ––>
                            <input class="btn btn-success btn-sm" type='submit' onclick="document.getElementById('swinsertar').value = 'S'" name='cr' id='cr' value='Enviar solicitud'>
                        </td>
                    </tr>    
                    </table>
                    <input value="" name="swinsertar" id="swinsertar" type="hidden" />

                    <table class="estilo_tabla_leyenda" width="90%" align="center" >
                        <tr>
                            <td align="left">* Cantidades de 0.00 a 5000.00 y de 5.00 en 5.00</td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>
                    </form>
                </div>  
            </article>
            <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>