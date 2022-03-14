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
    <link rel="stylesheet" href="MVC_TOCAR\VISTA\ESTILOS\estilos.css">
</head>


<body class="cuerpo_contenedor">

    <!––Incluimos la cabecera ––>
    <header class="cabecera">
    <?php include $incRoot."MVC_TOCAR\VISTA\INCLUDES\cabecera.php" ?>
    </header>


        <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
            <nav class="navega">
                <p style="font-size:large;">Empresas del sector</p>

                <ul>
                    <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
                    <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
                    <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
                    <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
                    <li class="li_sidebar"><a href="empresa5.php" class="enlace_sidebar">Empresa 5</a></li>
                    <li class="li_sidebar"><a href="empresa6.php" class="enlace_sidebar">Empresa 6</a></li>
                    <li class="li_sidebar"><a href="empresa7.php" class="enlace_sidebar">Empresa 7</a></li>
                    <li class="li_sidebar"><a href="empresa8.php" class="enlace_sidebar">Empresa 8</a></li>
                    <li class="li_sidebar"><a href="empresa9.php" class="enlace_sidebar">Empresa 9</a></li>
                    <li class="li_sidebar"><a href="empresa10.php" class="enlace_sidebar">Empresa 10</a></li>
                    <li class="li_sidebar"><a href="empresa11.php" class="enlace_sidebar">Empresa 11</a></li>
                    <li class="li_sidebar"><a href="empresa12.php" class="enlace_sidebar">Empresa 12</a></li>
                </ul>
            </nav>
            <aside class="barra">
                <p style="font-size:large;">Contactos</p>
                <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
                    <ul>
                        <li class="li_nav1">Teléfono</li>
                        <li class="li_nav2">912345678</li>
                        <li class="li_nav1">Email</li>
                        <li class="li_nav2">admin@asdete.com</li>
                        <li class="li_nav1">Dirección</li>
                        <li class="li_nav2">C\ Asdete 123</li>
                    </ul>
            </aside>


            <article class="skynet">

            <p style="font-size:large;">Calendarios A</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-alava-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Álava</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-albacete-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Albacete</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-alicante-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Alicante</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-almeria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Almeria</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-asturias-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Asturias</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-avila-2022-PDF.pdf" class="enlace_sidebar"target="_blank" >Ávila</a></li>
             </ul>


             <p style="font-size:large;">Calendarios B</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-badajoz-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Badajoz</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-baleares-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Baleares</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-barcelona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Barcelona</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-bilbao-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Bilbao</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-burgos-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Burgos</a></li>
            </ul>

            <p style="font-size:large;">Calendarios C</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-caceres-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Caceres</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-cadiz-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cadiz</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-cantabria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cantabria</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-castellon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Castellon</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-ceuta-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Ceuta</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-ciudad-real-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Ciudad Real</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-cordoba-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cordoba</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-la-coruna-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Coruña</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-ceuta-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cuenca</a></li>
            </ul>

            <p style="font-size:large;">Calendarios G</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-gijon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Gijón</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-granada-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Granada</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-guadalajara-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cantabria</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-castellon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Guadalajara</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-guipuzcoa-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Guipuzcoa</a></li>
            </ul>

            <p style="font-size:large;">Calendarios H</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-huelva-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Huelva</a></li>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-huesca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Huesca</a></li>
                    
            </ul>
                    




            </article>
            <footer class="pie"> <?php include $incRoot."MVC_TOCAR\VISTA\INCLUDES\pie.php" ?></footer>

</body>

</html>