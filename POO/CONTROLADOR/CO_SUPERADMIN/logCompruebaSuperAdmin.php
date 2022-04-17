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
    <title>Log Comprueba SuperAdministradores</title>
</head>
<body>


<?php 



	//Incluimos la clase Datos
		include $incRoot.'POO/MODELO/MO_UTILS/includesDatos.php';

	 //Instanciamos la clase Datos
		$dat = new Datos();

		//Recogemos los datos del nombre y el password que nos llegan por POST
		$nombre=$_POST['nombre'];
		$pass=$_POST['clave'];
		// Si se ha enviado un nombre por el formulario
		if (isset($nombre)){
			// Si el nombre existe comprobamos que esté en base de datos y que su password sea correcto
			if ($dat->existeSuperAdmin($nombre) && $dat->verificaPassSuperAdmin($nombre,$pass)) {
				// Creo una cookie con su nombre, para poderla comprobar más adelante he iniciamos sesión con los datos.
				session_start();
                $_SESSION['user_session'] ="superadmin_session";
                $_SESSION['user_name'] =$nombre;
				setcookie("superadmin_cookie", $nombre, 1);
				$url = $dirRoot.'POO/VISTA/VI_SUPERADMIN/vistaSuperAdminMenu.php';
				header('Location: '.$url);
		} else {
			//Si no mostramos un mensaje de no encontrado y un link a user_pass_error.php 
			$url = $dirRoot.'POO/VISTA/user_pass_error.php?tipologin=sadmin';
			header('Location: '.$url);
		}
	} else {
		//Si no mostramos un mensaje de no encontrado y un link a user_noencontrado_error.php
		$url = $dirRoot.'POO/VISTA/user_noencontrado_error.php?tipologin=sadmin';
		header('Location: '.$url);
	}


	?>

    
</body>
</html>