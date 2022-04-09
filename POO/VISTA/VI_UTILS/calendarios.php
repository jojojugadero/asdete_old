<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
    $(function() {
        var $tabButtonItem = $('#tab-button'),
        $tabSelect = $('#tab-select'),
        $tabContents = $('.tab-pane'),
        activeClass = 'show active';
        activeClassLink = 'active';

        $tabButtonItem.first().addClass(activeClass);
        $tabContents.not(':first').hide();

        $tabButtonItem.find('a').on('click', function(e) {
        var target = $(this).attr('href');

        $tabButtonItem.find('a').removeClass(activeClassLink);
        $(this).addClass(activeClassLink);
        $tabContents.removeClass(activeClass);
        $(target).addClass(activeClass);

        $tabButtonItem.removeClass(activeClass);
        $(this).parent().addClass(activeClass);
        $tabSelect.val(target);
        $tabContents.hide();
        $(target).show();
        e.preventDefault();
        });

        $tabSelect.on('change', function() {
        var target = $(this).val(),
                targetSelectNum = $(this).prop('selectedIndex');

        $tabButtonItem.removeClass(activeClass);
        $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
        $tabContents.hide();
        $(target).show();
        });
        });
    </script>
</head>


<body class="cuerpo_contenedor">

    <!––Incluimos la cabecera ––>
    <header class="cabecera">
        <?php include $incRoot."POO/VISTA/VI_INCLUDES/cabecera.php" ?>
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
                <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Volver</a>

                <div class="container">
                        <div class="row">
                                <div class="col-xs-12 tabs">
                                <nav>
                                <div class="nav nav-tabs" id="tab-button">
                                <a class="nav-item nav-link active" href="#nav-a">A</a>
                                <a class="nav-item nav-link" href="#nav-b">B</a>
                                <a class="nav-item nav-link" href="#nav-c">C</a>
                                <a class="nav-item nav-link" href="#nav-g">G</a>
                                <a class="nav-item nav-link" href="#nav-h">H</a>
                                <a class="nav-item nav-link" href="#nav-j">J</a>
                                <a class="nav-item nav-link" href="#nav-l">L</a>
                                <a class="nav-item nav-link" href="#nav-m">M</a>
                                <a class="nav-item nav-link" href="#nav-n">N</a>
                                <a class="nav-item nav-link" href="#nav-o">O</a>
                                <a class="nav-item nav-link" href="#nav-p">P</a>
                                <a class="nav-item nav-link" href="#nav-r">R</a>
                                <a class="nav-item nav-link" href="#nav-s">S</a>
                                <a class="nav-item nav-link" href="#nav-t">T</a>
                                <a class="nav-item nav-link" href="#nav-v">V</a>
                                <a class="nav-item nav-link" href="#nav-z">Z</a>
                                </div>
                                <div style="display:none;">
                                <select id="tab-select">
                                        <option value="#nav-a">A</option>
                                        <option value="#nav-b">B</option>
                                        <option value="#nav-c">C</option>
                                        <option value="#nav-g">G</option>
                                        <option value="#nav-h">H</option>
                                        <option value="#nav-j">J</option>
                                        <option value="#nav-l">L</option>
                                        <option value="#nav-m">M</option>
                                        <option value="#nav-n">N</option>
                                        <option value="#nav-o">O</option>
                                        <option value="#nav-p">P</option>
                                        <option value="#nav-r">R</option>
                                        <option value="#nav-s">S</option>
                                        <option value="#nav-t">T</option>
                                        <option value="#nav-v">V</option>
                                        <option value="#nav-z">Z</option>
                                </select>
                                </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-a">
                                        <h2>Calendarios A</h2>
                                        <ul class="lista-normal">
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-alava-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Álava</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-albacete-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Albacete</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-alicante-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Alicante</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-almeria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Almeria</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-asturias-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Asturias</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-avila-2022-PDF.pdf" class="enlace_sidebar"target="_blank" >Ávila</a></li>
                                        </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-b">
                                <h2>Calendarios B</h2>
                                <ul class="lista-normal">
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-badajoz-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Badajoz</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-baleares-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Baleares</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-barcelona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Barcelona</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-bilbao-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Bilbao</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-burgos-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Burgos</a></li>
                                </ul>
                                </div>


                                <div class="tab-pane fade" id="nav-c">
                                <h2>Calendarios C</h2>
                                <ul class="lista-normal">
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
                                   </div>

                                   <div class="tab-pane fade" id="nav-g">
                                        <h2>Calendarios G</h2>
                                        <ul class="lista-normal">
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-gijon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Gijón</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-granada-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Granada</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-guadalajara-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Cantabria</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-castellon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Guadalajara</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-guipuzcoa-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Guipuzcoa</a></li>
                                        </ul>
                                </div>



                                <div class="tab-pane fade" id="nav-h">
                                        <h2>Calendarios H</h2>
                                        <ul class="lista-normal">
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-huelva-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Huelva</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-huesca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Huesca</a></li>
                                                
                                        </ul>
                                </div>


                                
                                <div class="tab-pane fade" id="nav-j">
                                        <h2>Calendarios J</h2>
                                        <ul class="lista-normal">
                                               
                                        
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-jaen-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Jaen</a></li>
                                        
                                        </ul>
                                </div>


                                
                                <div class="tab-pane fade" id="nav-l">
                                        <h2>Calendarios L</h2>
                                        <ul class="lista-normal">
                                               
                                        
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-leon-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >León</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lleida-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lleida</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-logrono-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Logroño</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-lugo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Lugo</a></li>
                                                
                                        </ul>
                                </div>


                                <div class="tab-pane fade" id="nav-m">
                                        <h2>Calendarios M</h2>
                                        <ul class="lista-normal">
                                               
                                        
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-madrid-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Madrid</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-malaga-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Malaga</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-melilla-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Melilla</a></li>
                                        <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-murcia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Murcia</a></li>
                            
                                     </ul>
                                </div>


                                <div class="tab-pane fade" id="nav-n">
                                        <h2>Calendarios N</h2>
                                        <ul class="lista-normal">
                                               
                                        
                                                  <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-navarra-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Navarra</a></li>
                           
                            
                                           </ul>
                                </div>



                                <div class="tab-pane fade" id="nav-o">
                                        <h2>Calendarios O</h2>
                                        <ul class="lista-normal">
                                               
                                                                
                                                 <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-ourense-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Ourense</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-oviedo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Oviedo</a></li>

                            
                                     </ul>
                                </div>



                                <div class="tab-pane fade" id="nav-p">
                                        <h2>Calendarios P</h2>
                                        <ul class="lista-normal">
                                               
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-palencia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Palencia</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-palma-de-mallorca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Palma De Mallorca </a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-las-palmas-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Las Palmas</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-pamplona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Pamplona</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-pontevedra-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Pontevedra</a></li>
                                                
                                        </ul>
                                </div>




                                <div class="tab-pane fade" id="nav-r">
                                        <h2>Calendarios R</h2>
                                        <ul class="lista-normal">
                                               
                                                
                                             <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-la-rioja-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >La Rioja</a></li>

                            
                                      </ul>
                                </div>



                                <div class="tab-pane fade" id="nav-s">
                                        <h2>Calendarios S</h2>
                                        <ul class="lista-normal">
                                               
                                                
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-salamanca-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Salamanca</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-san-sebastian-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >San Sebastian</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-santander-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Santander</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-segovia-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Segovia</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-sevilla-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Sevilla</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-soria-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Soria</a></li>

                                
                                       </ul>
                                </div>



                                <div class="tab-pane fade" id="nav-t">
                                        <h2>Calendarios T</h2>
                                        <ul class="lista-normal">
                                               
                                                
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-tarragona-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Tarragona</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-tenerife-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Tenerife</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-teruel-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Teruel</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-toledo-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Toledo</a></li>
                                                

                                                
                                        </ul>

                                </div>

                                
                                <div class="tab-pane fade" id="nav-z">
                                        <h2>Calendarios Z</h2>
                                        <ul class="lista-normal">
                                               
                                                                
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-zamora-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Zamora</a></li>
                                                <li class="li_sidebar"><a href="https://www.calendarioslaborales.com/calendario-laboral-zaragoza-2022-PDF.pdf" class="enlace_sidebar" target="_blank" >Zaragoza</a></li>

                                                
                                        </ul>

                                </div>





                                                        
      

       
                
                           

                  
                           

                           
                  


                               




                
                                    

                    




            </article>
            <footer class="pie"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>