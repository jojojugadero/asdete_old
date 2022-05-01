<?php
//Redirigimos las rutas de nuestra aplicación
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log Comprueba Afiliados</title>
</head>

<body>

	<?php

	//Incluimos la clase para gestión de la base de datos

	include $incRoot."MODELO/MO_UTILS/includesDatos.php";

	//Instanciamos las clase Datos
	$dat = new Datos();


	//Recogemos el nombre y el password del formulario 
	$nombre = $_POST['nombre'];
	$pass = $_POST['password'];
	// Comprobamos que si se ha enviado un nombre por el formulario y un password, 
	//con los métodos [existeUsuario($nombre)] y [verificaPass($nombre, $pass] y que estos datos sean correctos
	if (isset($nombre)) {
		// Si existe el nombre verificamos a traves de los metodos aquí abajo
		if ($dat->existeUsuario($nombre) && $dat->verificaPass($nombre, $pass)) {
			//Creamos una sesión para comprobar que está en la página correcta
			session_start();
			//Recuperamos el ID afiliado logueado con el método getAfiliadoLogin() de la clase datos
			$afiliado = $dat->getAfiliadoLogin($nombre, $pass);

			//Datos de la sesión
			$_SESSION['user_session'] = "afiliado_session";
			$_SESSION['id_afiliado'] = $afiliado['id'];
			$_SESSION['user_name'] =$nombre;
			// Creamos una cookie con su nombre.
			setcookie("afiliado_cookie", $nombre, 1);
			//Despues de crear la sesión y la cookie redirigimos al usuario a vistaAfiliados.php 
			$url = $dirRoot."VISTA/VI_AFILIADOS/vistaAfiliados.php";
			header('Location: ' . $url);
		} else {
			//Si no redirigimos al afiliado al inicio del login otra vez
			$url = $dirRoot.'VISTA/user_pass_error.php?tipologin=afil';
			header('Location: '.$url);
		}
	} else {
		//Si no redirigimos al afiliado al inicio del login otra vez
		$url = $dirRoot.'VISTA/user_noencontrado_error.php?tipologin=afil';
		header('Location: '.$url);
	}

	?>


</body>

</html>