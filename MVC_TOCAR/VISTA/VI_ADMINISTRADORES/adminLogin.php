<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="..\ESTILOS\estilos.css">

    <!––Función en javascript, para ponerla en el "onclick()" para volver al indice ––>
        <script>
            function volver() {
                document.location.href = "..\index.php";
            }
        </script>
</head>


<body class="cuerpo_contenedor">


<!––Incluimos la cabecera ––>
<header class="cabecera">
        <?php include "..\VI_INCLUDES\cabecera.php" ?>
    </header>


    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
   <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

      <ul >
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
      </ul>
   </nav>
   <aside class="barra"><p style="font-size:large;">Contactos</p>
   <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
   <ul >
      <li class="li_nav1">Teléfono</li>
      <li class="li_nav2">912345678</li>
      <li class="li_nav1">Email</li>
      <li class="li_nav2">admin@asdete.com</li>
      <li class="li_nav1">Dirección</li>
      <li class="li_nav2">C\ Asdete 123</li>
   </ul>
   </aside>


    <article class="skynet">
        <a href="..\index.php">Indice</a>

        <!––Formulario con los datos de los administradores ––>
        <form action="../../CONTROLADOR/CO_ADMINISTRADORES/logCompruebaAdmin.php" method="POST" id="creacion">

            <div align="center" style="margin-top:100px;">
                <div class="perdiv">
                    <table>
                        <tr>
                            <td align="center" colspan="2">Personales Login</td>
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
                            <td><input type="password" name="clave"></td>
                        </tr>
                    </table>

                    <input type="button" onclick="volver();" name="accion" value="Volver">
                    <input type="submit" name="accion" value="Enviar">
                </div>
            </div>

        </form>

    </article>
    <footer class="pie"><?php include "..\VI_INCLUDES\pie.php" ?></footer>

</body>

</html>