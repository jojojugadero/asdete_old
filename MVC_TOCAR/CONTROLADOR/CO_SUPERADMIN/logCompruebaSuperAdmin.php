<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprueba personal</title>
</head>
<body>

<?php 

		include "MVC_TOCAR\MODELO\datos.php";

		$nombre=$_POST['nombre'];
		$pass=$_POST['clave'];
		// Si se ha enviado un nombre por el formulario
		if (isset($nombre)){
			// Si existe
			if (existeSuperAdmin($nombre) && verificaPassSuperAdmin($nombre,$pass)) {
				// Creo una cookie con su nombre, para poderla comprobar más adelante.
				session_start();
                $_SESSION['superadmin_sesion'] ="superadmin_sesion";
				setcookie("superadmin_cookie", $nombre, 1);
				$url ="MVC_TOCAR\VISTA\SUPERADMIN\appSuperAdmin.php";
				header('Location: '.$url);
			}else{
				echo "Clave o usuario no validos como -SUPERADMIN-";
			}
		}else{
			echo "Usuario no es SUPERADMIN";
		}


	?>

    
</body>
</html>