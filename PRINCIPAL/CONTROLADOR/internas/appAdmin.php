
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="VISTA/css/estilos.css">
</head>
<?php

include 'MODELO\BBDD\datos.php';


//Iniciamos sesión
session_start();

//Comprobamos que la sesión es correcta y si es correcta se queda en la página se queda en la página y si no, nos redirige a index.php 
if(isset($_SESSION['personal_sesion']) == 'personal_sesion') {
    $url1 ="appPersonal.php";
    //header('Location: '.$url1);
  } else {
    $url2 ="index.php";
    header('Location: '.$url2);
  }

  //Recogemos las variables cuando insertamos nuevos registros, modificamos o eliminamos
  $id =  isset($_POST['id']) ? $_POST['id'] : '';
  $nif =  isset($_POST['nif']) ? $_POST['nif'] : '';
  $password =  isset($_POST['password']) ? $_POST['password'] : '';
  $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
  $ape1 =  isset($_POST['ape1']) ? $_POST['ape1'] : '';
  $ape2 =  isset($_POST['ape2']) ? $_POST['ape2'] : '';
  $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : '';
  $email =  isset($_POST['email']) ? $_POST['email'] : '';
  $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
  $id_empresa =  isset($_POST['empresa']) ? $_POST['empresa'] : '';
  
  //Recogemos variables para la acción que va a hacer el botón en el onclick
  $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
  $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
  $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
  $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';

  //Recogemos el valor de las variables para realizar las operaciones de base de datos
  $datos['id'] = $id;
  $datos['nif'] = $nif;
  $datos['password'] = $password;
  $datos['nombre'] = $nombre;
  $datos['apellido1'] = $ape1;
  $datos['apellido2'] = $ape2;
  $datos['telefono'] = $telefono;
  $datos['email'] = $email;
  $datos['direccion'] = $direccion;
  $datos['id_empresa_fk'] = $id_empresa;

  //Se comprueba el tipo de acción para dar de alta modificar o eliminar el afiliado
  if($swinsertar == 'S') {
    altaAfiliado($datos);
  } else if($swmodificarapply == 'S') {
    modAfiliado($datos);
  } else if($sweliminar == 'S') {
    eliminarAfiliado($id);
  }

  //Recogemos todos los afiliados y empresas para mostarlos por pantalla
  $afiliados = getAfiliados();
  $empresas = getEmpresas();

  //Si vamos a modificar el afiliado se recoge el afiliado por ID para su modificación
  $afil_modi = $swmodificar == 'S' ? getAfiliado($id) : '';
?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
        <?php include "cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
   <nav class="navega"><?php

          include 'VISTA\includes\administradores\navegaAdministradores.php';?>
   </nav>

     <aside class="barra"><?php

        include 'VISTA\includes\administradores\barraAdministradores.php';?>
   </aside>


    <article class="skynet">
               <?php include 'VISTA\includes\administradores\articleAppAdmin.php';?>
    </article>
    <footer class="pie"><?php include "VISTA/pie.php" ?></footer>
    

</body>
</html>


