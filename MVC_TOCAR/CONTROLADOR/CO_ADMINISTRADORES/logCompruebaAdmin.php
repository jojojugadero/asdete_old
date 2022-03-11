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
    $pagina = $_SERVER['PHP_SELF'];
    $contar_slashes = substr_count($pagina, '/')-1;
    for($i=1;$i<=$contar_slashes;$i++){
        $nivel .= "../";
    }
    
    // Luego utilizamos la variable $nivel antepuesta a todas las funciones que requieran especificar un nivel de 
    // directorio, y que sea absoluto.
?>

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
				$url = 'VISTA/VI_ADMINISTRADORES/appAdmin.php';
				header('Location: '.$nivel.$url);
				/*$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'VISTA/appAdmin.php';
				header("Location: http://$host$uri/$extra");*/
			}else{
				echo "Clave o usuario no validos";
			}
		}else{
			echo "Usuario no encontrado;";
		}


	?>

    
</body>
</html>