<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

session_start();
include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO\VISTA\ESTILOS\estilos.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>


<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>">

    <!--Incluimos la cabecera -->
        <header class="cabecera<?php echo $sufijo_estilo; ?>">
            <?php include $incRoot.'POO\VISTA\VI_INCLUDES\cabecera.php'?> 
        </header>

        <!--En la parte izquierda seleccionamos las empresas de una lista en HTML -->
            <nav class="navega<?php echo $sufijo_estilo; ?>">
            <?php include $incRoot.'POO\VISTA\VI_INCLUDES\nav.php'?> 
            </nav>
            <aside class="barra<?php echo $sufijo_estilo; ?>">
                <p style="font-size:large;">Contactos</p>
                <!--En la parte derecha ponemos los contactos de la web con una lista en HTML -->
                <?php include $incRoot.'POO\VISTA\VI_INCLUDES\aside.php'?> 
            </aside>


            <article class="skynet<?php echo $sufijo_estilo; ?>">

            <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php">Indice</a> > <a href="<?php echo $url_volver; ?>">Volver</a>
            <br/><br/>
                <h2>EMPRESA 6</h2>
                <section>
                    <h3>Introducción</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab illum, cumque minima dolor vitae perferendis odit exercitationem nesciunt tenetur provident reprehenderit recusandae in cupiditate beatae deserunt nostrum aut necessitatibus dolorem!</p>
                </section>
                <section>
                    <h3>Un poco de historia</h3>
                    <section>
                        <h3>1960</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, ducimus a quaerat debitis temporibus architecto quas, voluptates est iure rem blanditiis facere numquam illo et eaque cum possimus magnam. Libero!</p>
                    </section>
                    <section>
                        <h3>1970</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum facere? Similique eaque, quas ratione ea reprehenderit dignissimos voluptatibus laborum aliquam dolorum, dolore impedit optio esse assumenda magni ullam quod.lorem
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial.
                        </p>
                    </section>
                    <section>
                        <h3>1980</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial.
                        </p>
                    </section>
                    <section>
                        <h3>1990</h3>
                        <p>El gobierno de los Estados Unidos revocó la carta del Estado de Nueva York de los Vengadores en un tratado con la Unión Soviética. Los Vengadores luego recibieron un estatuto de las Naciones Unidas y los Vengadores se dividieron en dos equipos con un equipo suplente de reserva que respaldaba a los equipos principales.</p>
                    </section>
                    <section>
                        <h3>2000</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial..</p>
                    </section>
                    <section>
                        <h3>2010</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial.</p>
                    </section>
                    <section>
                        <h4>¿Cómo se unieron los héroes más poderosos de la Tierra?</h4>
                        <p>Pues en el primer número del cómic de Los Vengadores, se nos narra cómo Loki, hermano de Thor de insaciable ambición, tiende una trampa a Hulk para que le consideren culpable de un accidente de tren (aunque en realidad consigue salvar a todos los viajeros). Tras esto, Loki envía un mensaje para que lo intercepte su hermano y, así, tenderle una emboscada. Por suerte para Thor, el mensaje también llega a oídos de El Hombre Hormiga, El Hombre de Hierro y La Avista. Juntos, descubren que todo ha sido una encerrona y acaban con los planes de Loki. Así nacieron Los Vengadores.</p>
                        <p>
                            De esta forma, se considera que la formación original de Los Vengadores está compuesta por Hulk, Thor, Iron Man, La Avispa y El Hombre Hormiga. Siendo en el cómic número cuatro el primero donde aparece ya El Capitán América. De esta forma se completa así el tridente clásico de Los Vengadores: Iron Man, Thor y El Capitán América.</p>
                        <p>n grupo en constante cambio
                            Uno de los principales atractivos de la formación, en los cómics claro, es la incesante marea de superhéroes que pasan por Los Vengadores. No en vano, hasta la fecha, son más de 75 los superhéroes que han formado parte del grupo y que podemos dividir en tres categorías: miembros completos (los que acuden a todas las misiones), reservas (que van cuando algún superhéroe no puede) y honorarios (que nunca formaron parte oficial de Los Vengadores pero se les otorga este cargo como reconocimiento a alguna ayuda prestada).</p>
                    </section>
                </section>




            </article>
            <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO\VISTA\VI_INCLUDES\pie.php" ?></footer>

</body>

</html>