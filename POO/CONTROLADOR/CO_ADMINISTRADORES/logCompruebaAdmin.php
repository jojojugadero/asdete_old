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
    <title>Log Comprueba Administradores</title>
</head>
<body>


<?php 




		include $incRoot.'POO/MODELO/datos.php';

		$dat = new Datos();
		$nombre=$_POST['nombre'];
		$pass=$_POST['password'];
		// Si se ha enviado un nombre por el formulario
		if (isset($nombre)){
			// Si existe
			if ($dat->existeAdmin($nombre) && $dat->verificaPassAdmin($nombre,$pass)) {
				// Creo una cookie con su nombre, para poderla comprobar más adelante.
				session_start();
                $_SESSION['user_session'] ="personal_session";
				$_SESSION['user_name'] =$nombre;
				setcookie("personal_cookie", $nombre, 1);
				$url = $dirRoot.'POO/VISTA/VI_ADMINISTRADORES/vistaAdmin.php';
				header('Location: '.$url);
			/*	$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = '../VISTA/VI_ADMINISTRADORES/appAdmin.php';
				header("Location: http://$host$uri/$extra");*/
		} else {
			//Si no mostramos un mensaje de no encontrado y un link a index
			echo "Clave o usuario no validos";
			echo "<a href='".$dirRoot."POO/VISTA/index.php?tipologin=admin'>Volver indice</a>";
		}
	} else {
		//Si no mostramos un mensaje de no encontrado y un link a index
		echo "Usuario no encontrado;";
		echo "<a href='".$dirRoot."POO/VISTA/index.php?tipologin=admin'>Volver indice</a>";
	}


	?>

    
</body>
</html>