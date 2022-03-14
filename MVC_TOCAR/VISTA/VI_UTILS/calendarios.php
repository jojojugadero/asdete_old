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


            <p style="font-size:large;">Calendarios J</p>

            <ul>
                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-jaen-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Jaen</a></li>
                    
            </ul>

            <p style="font-size:large;">Calendarios L</p>

                <ul>
                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-leon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >León</a></li>
                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lleida-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lleida</a></li>
                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-logrono-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Logroño</a></li>
                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lugo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lugo</a></li>
                        
                </ul>

                <p style="font-size:large;">Calendarios L</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-leon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >León</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lleida-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lleida</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-logrono-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Logroño</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lugo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lugo</a></li>
                            
                    </ul>

                    <p style="font-size:large;">Calendarios M</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-madrid-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Madrid</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-malaga-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Malaga</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-melilla-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Melilla</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-murcia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Murcia</a></li>
                            
                    </ul>

                    <p style="font-size:large;">Calendarios N</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-navarra-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Navarra</a></li>
                           
                            
                    </ul>

                    <p style="font-size:large;">Calendarios O</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-ourense-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Ourense</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-oviedo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Oviedo</a></li>

                            
                    </ul>

                    <p style="font-size:large;">Calendarios P</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-palencia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Palencia</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-palma-de-mallorca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Palma De Mallorca </a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-las-palmas-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Las Palmas</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-pamplona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Pamplona</a></li>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-pontevedra-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Pontevedra</a></li>
                            
                    </ul>
<
                    <p style="font-size:large;">Calendarios R</p>

                    <ul>
                            <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-la-rioja-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >La Rioja</a></li>

                            
                    </ul>


                    <p style="font-size:large;">Calendarios P</p>

                        <ul>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-salamanca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Salamanca</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-san-sebastian-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >San Sebastian</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-santander-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Santander</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-segovia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Segovia</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-sevilla-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Sevilla</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-soria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Soria</a></li>

                                
                        </ul>


                        <p style="font-size:large;">Calendarios P</p>

                        <ul>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-tarragona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Tarragona</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-tenerife-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Tenerife</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-teruel-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Teruel</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-toledo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Toledo</a></li>
                                

                                
                        </ul>

                        <p style="font-size:large;">Calendarios V</p>

                        <ul>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-valencia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Valencia</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-valladolid-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Valladolid</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-vitoria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Vitoria</a></li>
                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-vizcaya-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Vizcaya</a></li>
                                

                                
                        </ul>


                        <p style="font-size:large;">Calendarios Z</p>

                            <ul>
                                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-zamora-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Zamora</a></li>
                                    <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-zaragoza-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Zaragoza</a></li>

                                    
                            </ul>

                    




            </article>
            <footer class="pie"> <?php include $incRoot."MVC_TOCAR\VISTA\INCLUDES\pie.php" ?></footer>

</body>

</html>