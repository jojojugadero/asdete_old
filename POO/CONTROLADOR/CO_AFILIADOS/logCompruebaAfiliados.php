<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Comprueba Afiliados</title>
</head>

<body>

	<?php

	//Incluimos la clase para gestión de la base de datos

	include $incRoot."POO/MODELO/datos.php";

	$dat = new Datos();


	//Recogemos el nombre y el password del formulario 
	$nombre = $_POST['nombre'];
	$pass = $_POST['password'];
	// Comprobamos que si se ha enviado un nombre por el formulario y un password, con los métodos [existeUsuario($nombre)] y [verificaPass($nombre, $pass] que estos datos sean correctos
	if (isset($nombre)) {
		// Si existe verificamos a traves de los metodos 
		if ($dat->existeUsuario($nombre) && $dat->verificaPass($nombre, $pass)) {
			//Creamos una sesión para comprobar que está en la página correcta
			session_start();
			//Recuperamos los datos del afiliado logueado con el método getAfiliadoLogin() de la clase datos
			$afiliado = $dat->getAfiliadoLogin($nombre, $pass);

			//Datos de la sesión
			$_SESSION['afiliado_sesion'] = "afiliado_sesion";
			$_SESSION['id_afiliado'] = $afiliado['id'];
			// Creamos una cookie con su nombre.
			setcookie("afiliado_cookie", $nombre, 1);
			//Despues de crear la sesión y la cookie redirimos al usuario (si es correcto) a appAfiliados.php 
			$url = $dirRoot."POO/VISTA/VI_AFILIADOS/vistaAfiliados.php";
			header('Location: ' . $url);
		} else {
			//Si no mostramos un mensaje de no encontrado y un link a index
			echo "Clave o usuario no validos";
			echo "<a href=$dirRoot.'POO/VISTA/index.php'>Volver indice</a>";
		}
	} else {
		//Si no mostramos un mensaje de no encontrado y un link a index
		echo "Usuario no encontrado;";
		echo "<a href=$dirRoot.'POO/VISTA/index.php'>Volver indice</a>";
	}

	?>


</body>

</html>