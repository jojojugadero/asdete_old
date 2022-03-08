
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

  function llamaCabecera(){
    

      echo "<h1>ASDETE, la unión hace la fuerza...</h1>";

      echo "<p><a href ='VISTA/index.php'>Volver</a></p>";

      echo "<p><a href ='index.php'>VolverMal</a></p>";




  }

  function navegaAdministradores(){
    echo "<p style="font-size:large;">Empresas del sector</p>

<ul >
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
</ul>";
  }


  function barraAdministradores (){

    echo " <p style="font-size:large;">Contactos</p>
               
<ul>
    <li class="li_nav1">Teléfono</li>
    <li class="li_nav2">912345678</li>
    <li class="li_nav1">Email</li>
    <li class="li_nav2">admin@asdete.com</li>
    <li class="li_nav1">Dirección</li>
    <li class="li_nav2">C\ Asdete 123</li>
</ul>";
  }

  function compruebaRegistrosAdmin(){
  
  //Comprobamos si hay registros
    if (mysqli_num_rows($afiliados) == 0) {
      echo '<tr>\n
          <td colspan="11">No se han encontrado afiliados</td>
         </tr>';
    } else {
      $num = 0;
      //Si hay registros se recorren para mostar las filas
      foreach($afiliados as $fila){
        $empresa = getEmpresa($fila['id_empresa_fk']);
        //Con este operador ternario damos estilo a cada de las lineas del formulario
        $color_fila = $num%2 == 1 ? 'estilo_fila1_tabla':'estilo_fila2_tabla';
        $num++;
  
  }
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


