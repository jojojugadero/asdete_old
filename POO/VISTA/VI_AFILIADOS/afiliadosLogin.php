<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <!––Función en javascript, para ponerla en el "onclick()" para volver al indice ––>
    <script>

        function volver() {
            
            document.location.href = "<?php echo $dirRoot; ?>POO/VISTA/index.php";
        }
    </script>
</head>


<body class="cuerpo_contenedor">


    <header class="cabecera">

        <?php include $incRoot.'POO/VISTA/VI_INCLUDES/cabecera.php'?> 
    
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
    <!––Miga de pan (Breadcrumbs) ––>
        <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a>

        <!––Formulario que enviará datos para comprobar que el usuario y password estan correctos en base de datos ––>
        <form action="<?php echo $dirRoot; ?>POO/CONTROLADOR/CO_AFILIADOS/logCompruebaAfiliados.php" method="POST" id="creacion" >
            
            <div align="center" style="margin-top:100px;">
                <div class="afidiv" >
                    <table >
                        <tr>
                            <td align="center" colspan="2">Afiliados Login</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top:20px;">Introduce tu nombre y tu password</td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:5px;">Nombre:</td>
                            <td><input type="text" name="nombre"></td>
                        </tr>
                        <tr>
                            <td align="right" style="padding-right:5px;">Clave:</td>
                            <td><input type="password" name="password" ></td>
                        </tr>
                    </table>
                    <!–-Botones para volver al indice o enviar datos del formulario ––>
                    <input type="button" onclick="volver();" name="accion" value="Volver">
                    <input type="submit" name="accion" value="Enviar">
                </div>
            </div>

        </form>

    </article>
    <footer class="pie"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>