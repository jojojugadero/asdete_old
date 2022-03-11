<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprueba Administradores</title>
</head>
<body>

<?php 

		include "..\..\MODELO\datos.php";

		$nombre=$_POST['nombre'];
		$pass=$_POST['clave'];
		// Si se ha enviado un nombre por el formulario
		if (isset($nombre)){
			// Si existe
			if (existeAdmin($nombre) && verificaPassAdmin($nombre,$pass)) {
				// Creo una cookie con su nombre, para poderla comprobar más adelante.
				session_start();
                $_SESSION['personal_sesion'] ="personal_sesion";
				setcookie("personal_cookie", $nombre, 1);
				$url ="..\VISTA\ADMINISTRADORES\appAdmin.php";
				header('Location: '.$url);
			}else{
				echo "Clave o usuario no validos";
			}
		}else{
			echo "Usuario no encontrado;";
		}


	?>

    
</body>
</html>