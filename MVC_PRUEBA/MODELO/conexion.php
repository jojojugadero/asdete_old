<?php  



	function crearConexion($database) {

		// Datos de conexión
		$host = "localhost";
		$user = "root";
		$password = "";

		// Establecemos la conexión con la base de datos
		$conexion = mysqli_connect($host, $user, $password, $database);

		// Si hay un error en la conexión, lo mostramos y detenemos.
		if (!$conexion) {
			die("<br>Error de conexión con la base de datos: " . mysqli_connect_error());
		}
		// Si está todo correcto, enviamos la conexión con la base de datos.
		else {
			echo "<br>Conexion correcta a la base de datos: " . $database;
		}

		return $conexion;
	}


    function eliminar($conexion, $id)
    {

        $sql = "DELETE FROM clientes WHERE nombre = '$id'";
        mysqli_query($conexion, $sql);
    }

    function borrarCiudad($identificador) {
		$DB = crearConexion("world");

		$sql = "DELETE FROM city WHERE ID='" . $identificador . "'";

		$result = mysqli_query($DB, $sql);

		if ($result) {
			return $result;
		// Si no, enviamos un mensaje de error.
		} else {
			echo "Error en funcion borrarCiudad.";
		}

		mysqli_close($DB);
	}

    function anadirCiudad($nombre, $codigoPais, $distrito, $poblacion) {
		$DB = crearConexion("world");

		$sql = "INSERT INTO city (Name, CountryCode, District, Population) 
				VALUES ('" . $nombre . "', '" . $codigoPais . "', '" . $distrito . "', '" . $poblacion . "')";  
				// Mucho cuidado con las comillas que abren y cierran.

		$result = mysqli_query($DB, $sql);

		if ($result) {
			return $result;
		// Si no, enviamos un mensaje de error.
		} else {
			echo "Error en funcion anadirCiudad.";
		}
		mysqli_close($DB);
	}
