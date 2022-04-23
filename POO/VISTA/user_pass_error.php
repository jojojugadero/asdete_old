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

    $tipologin =  isset($_GET['tipologin']) ? $_GET['tipologin'] : '';
    if($tipologin == '') {
        $tipologin = 'afil';
    }
    include $incRoot."POO/CONTROLADOR/ControlEstilos.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asdete</title>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<?php   //  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>?>
    <link rel="stylesheet" href="<?php echo $dirRoot; ?>POO/VISTA/ESTILOS/estilos.css">
</head>


<body class="cuerpo_contenedor<?php echo $sufijo_estilo; ?>">


    <header class="cabecera<?php echo $sufijo_estilo; ?>">

        <?php include $incRoot.'POO/VISTA/VI_INCLUDES/cabecera.php'?> 
    
    </header>

    <!--En la parte izquierda seleccionamos las empresas de una lista en HTML -->
    <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;"><!--Empresas del sector--></p>

        <?php //include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

     </nav>

        <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

            <!--En la parte derecha ponemos los contactos de la web con una lista en HTML -->
            <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

        </aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">

            
            <div class="container login-contenedor">
                <div class="row">
                    <div class="col-md-6 login-centrado">
                        <div class="login-formulario1">
                            <h3>Clave o usuario no validos</h3>
                            <!--Formulario que enviará datos para comprobar que el usuario y password estan correctos en base de datos -->
                            <div class="form-group">
                                <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php?tipologin=<?php echo $tipologin;?>" >Volver al indice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>