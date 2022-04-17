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
    //Iniciamos sesión
    session_start();

    $tipologin =  isset($_GET['tipologin']) ? $_GET['tipologin'] : '';
    if($tipologin == '') {
        $tipologin = 'afil';
    }
    $swlogout =  isset($_GET['swlogout']) ? $_GET['swlogout'] : '';
    //if($swlogout == 'S') {
        session_destroy();
        $_SESSION = null;
    //}
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

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
    <nav class="navega<?php echo $sufijo_estilo; ?>"><p style="font-size:large;"><!––Empresas del sector--></p>

        <?php //include $incRoot."POO/VISTA/VI_INCLUDES/nav.php" ?>

     </nav>

        <aside class="barra<?php echo $sufijo_estilo; ?>"><p style="font-size:large;">Contactos</p>

            <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
            <?php include $incRoot."POO/VISTA/VI_INCLUDES/aside.php" ?>

        </aside>


    <article class="skynet<?php echo $sufijo_estilo; ?>">

            
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-center">
                    <?php if($tipologin == 'afil'){?>
                        <div class="login-form-1">
                            <h3>Login Afiliados</h3>
                            <!––Formulario que enviará datos para comprobar que el usuario y password estan correctos en base de datos ––>
                            <form action="<?php echo $dirRoot; ?>POO/CONTROLADOR/CO_AFILIADOS/logCompruebaAfiliados.php" method="POST" >
                                <div class="form-group">
                                    <input name="nombre" type="text" class="form-control" placeholder="Introduce nombre de afiliado *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Introduce contraseña *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btnSubmit" value="Login" />
                                </div>
                                <div class="form-group">
                                    <a href="#" class="ForgetPwd">¿Ha olvidado su contraseña?</a>
                                </div>
                            </form>
                        </div>
                    <?php } else if($tipologin == 'admin') {?>
                        <div class="login-form-2">
                            <h3>Login Administradores</h3>
                            <!––Formulario que enviará datos para comprobar que el usuario y password estan correctos en base de datos ––>
                            <form action="<?php echo $dirRoot; ?>POO/CONTROLADOR/CO_ADMINISTRADORES/logCompruebaAdmin.php" method="POST" >
                                <div class="form-group">
                                    <input name="nombre" type="text" class="form-control" placeholder="Introduce nombre de administrador *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Introduce contraseña *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btnSubmit" value="Login" />
                                </div>
                                <div class="form-group">

                                <a href="#" class="ForgetPwd">¿Ha olvidado su contraseña?</a>
                                </div>
                            </form>
                        </div>
                    <?php } else if($tipologin == 'sadmin') {?>
                        <div class="login-form-3">
                            <h3>Login SuperAdministradores</h3>
                            <!––Formulario que enviará datos para comprobar que el usuario y password estan correctos en base de datos ––>
                            <form action="<?php echo $dirRoot; ?>POO/CONTROLADOR/CO_SUPERADMIN/logCompruebaSuperAdmin.php" method="POST" >
                                <div class="form-group">
                                    <input name="nombre" type="text" class="form-control" placeholder="Introduce nombre de superadministrador *" value="" />
                                </div>
                                <div class="form-group">
                                    <input name="clave" type="password" class="form-control" placeholder="Introduce contraseña *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btnSubmit" value="Login" />
                                </div>
                                <div class="form-group">

                                <a href="#" class="ForgetPwd">¿Ha olvidado su contraseña?</a>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                        <div class="form-margin-top">
                        <?php if($tipologin == 'afil'){?>
                            ¿No eres afiliado? 
                            <a href="index.php?tipologin=admin">Administrador</a>
                            | 
                            <a href="index.php?tipologin=sadmin">SuperAdministrador</a>
                        <?php } else if($tipologin == 'admin') {?>
                            ¿No eres administrador? 
                            <a href="index.php?tipologin=afil">Afiliados</a>
                            | 
                            <a href="index.php?tipologin=sadmin">SuperAdministrador</a>
                            <?php } else if($tipologin == 'sadmin') {?>
                            ¿No eres superadministrador? 
                            <a href="index.php?tipologin=afil">Afiliados</a>
                            | 
                            <a href="index.php?tipologin=admin">Administrador</a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </article>
    <footer class="pie<?php echo $sufijo_estilo; ?>"> <?php include $incRoot."POO/VISTA/VI_INCLUDES/pie.php" ?></footer>

</body>

</html>