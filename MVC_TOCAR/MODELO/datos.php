<?php

	//Función para crear la conexión a base de datos
	function crearConexion($database) {

		// Datos de conexión
		$host = "localhost";
		$user = "root";
		$password = "";

		// Establecemos la conexión con la base de datos
		$conexion = mysqli_connect($host, $user, $password, $database);

		return $conexion;
	}
	
	//Verificamos el nombre del afiliado en base de datos

	function existeUsuario($nombre){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados WHERE nombre = '" . $nombre . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			echo "El nombre existe";
		} else {
			return false;
			echo "El nombre NO existe";
		}

		mysqli_close($conexion);
	}

	//Verificamos el password de un afiliado en base de datos
	function verificaPass($nombre,$pass){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados WHERE nombre = '" . $nombre . "' and password = '" . $pass . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			
		} else {
			return false;
			
		}

		mysqli_close($conexion);
	}

	//Nos devuelve los datos de un afiliado a través de su nombre y contraseña
	function getAfiliadoLogin($nombre,$pass){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados WHERE nombre = '" . $nombre . "' and password = '" . $pass . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		return mysqli_fetch_assoc($resultado);

		mysqli_close($conexion);
	}

	//Comprobamos que el nombre del personal del sindicato sea correcto
	function existeAdmin($nombre){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores WHERE nickname = '" . $nombre . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			echo "El nombre existe";
		} else {
			return false;
			echo "El nombre NO existe";
		}

		mysqli_close($conexion);
	}

	//Comprobamos que el nombre del SUPERADMIN sea correcto

	function existeSuperAdmin($nombre){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM superadmin WHERE nickname = '" . $nombre . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			echo "El SUPERADMIN existe";
		} else {
			return false;
			echo "El SUPERADMIN NO existe";
		}

		mysqli_close($conexion);
	}

	//Verificamos que el password del personal del sindicato sea correcto en base de datos
	function verificaPassAdmin($nombre,$pass){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores WHERE nickname = '" . $nombre . "' and password = '" . $pass . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			
		} else {
			return false;
			
		}

		mysqli_close($conexion);
	}

	//Verificamos que el password del SUPERADMIN del sindicato sea correcto en base de datos
	function verificaPassSuperAdmin($nombre,$pass){
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM superadmin WHERE nickname = '" . $nombre . "' and password = '" . $pass . "'";
		
		$resultado = mysqli_query($conexion, $consulta);

		if (mysqli_num_rows($resultado) > 0) {
			return true;
			
		} else {
			return false;
			
		}

		mysqli_close($conexion);
	}

	//Da de alta un afiliado con los datos introducidos por pantalla
	function altaAfiliado($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "INSERT INTO `afiliados`(`nif`, `password`, `nombre`, `apellido1`, `apellido2`, `telefono`, `email`, `direccion`, `id_empresa_fk`) VALUES ('".
		$datos['nif']."','".
		$datos['password']."','".
		$datos['nombre']."','".
		$datos['apellido1']."','".
		$datos['apellido2']."','".
		$datos['telefono']."','".
		$datos['email']."','".
		$datos['direccion']."','".
		$datos['id_empresa_fk']."')";

		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}

	//Modifica al afiliado con los datos introducidos por pantalla

	function modAfiliado($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "UPDATE `afiliados` SET 
		`nif`='".$datos['nif']."',
		`password`='".$datos['password']."',
		`nombre`='".$datos['nombre']."',
		`apellido1`='".$datos['apellido1']."',
		`apellido2`='".$datos['apellido2']."',
		`telefono`='".$datos['telefono']."',
		`email`='".$datos['email']."',
		`direccion`='".$datos['direccion']."',
		`id_empresa_fk`='".$datos['id_empresa_fk']."' WHERE id = ".$datos['id'];


		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}

	//Elimina un afiliado por su ID

	function eliminarAfiliado($id) {
		$conexion = crearConexion("asdete");

		$consulta = "DELETE FROM afiliados WHERE id = ".$id;

		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}

	//Nos devuelve todas las empresas de la base de datos

	function getEmpresas() {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM empresa";

		$resultado = mysqli_query($conexion, $consulta);

		return $resultado;

		mysqli_close($conexion);
	}

	//Nos devuelve todos los afiliados de la base de datos
	function getAfiliados() {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados ORDER BY ID ASC";

		$resultado = mysqli_query($conexion, $consulta);

		return $resultado;

		mysqli_close($conexion);
	}

	

	//Nos devuelve todos los datos del afiliado a través de su ID
	function getAfiliado($id) {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados WHERE id = ".$id;

		$resultado = mysqli_query($conexion, $consulta);

		if (isset($resultado)) {
			if(mysqli_num_rows($resultado) > 0) {
				return mysqli_fetch_assoc($resultado);
			} else {
				$vacio = [];
				return $vacio;
			}
		} else {
			$vacio = [];
			return $vacio;
		}

		mysqli_close($conexion);
	}
	//Nos devuelve todos los datos del afiliado a través de su NIF
	function getAfiliadoNIF($nif) {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM afiliados WHERE nif = '".$nif."'";

		$resultado = mysqli_query($conexion, $consulta);
		if (mysqli_num_rows($resultado) > 0) {
			return mysqli_fetch_assoc($resultado);
		} else {
			$vacio = [];
			return $vacio;
		}

		mysqli_close($conexion);
	}

	//Nos devuelve todos los datos de una empresa a través de su ID
	function getEmpresa($id) {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM empresa WHERE id = '" . $id . "'";

		$resultado = mysqli_query($conexion, $consulta);

		if (isset($resultado)) {
			if(mysqli_num_rows($resultado) > 0) {
				return mysqli_fetch_assoc($resultado);
			} else {
				$vacio = [];
				return $vacio;
			}
		} else {
			$vacio = [];
			return $vacio;
		}

		mysqli_close($conexion);
	}



	//Nos devuelve todos los administradores de la base de datos
	function getAdministradores($id) {

		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores ORDER BY ID ASC";

		$resultado = mysqli_query($conexion, $consulta);

		return $resultado;

		mysqli_close($conexion);
	}

	//Nos devuelve todos los datos del administrador a través de su NICK
	function getAdministradorNick($nick) {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores WHERE nickname = '".$nick."'";

		$resultado = mysqli_query($conexion, $consulta);
		if (mysqli_num_rows($resultado) > 0) {
			return mysqli_fetch_assoc($resultado);
		} else {
			$vacio = [];
			return $vacio;
		}

		mysqli_close($conexion);
	}
	
	
	//Nos devuelve todos los datos de un adminstrador a través de su ID
	function getAdministradorId($id) {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores WHERE id = '" . $id . "'";

		$resultado = mysqli_query($conexion, $consulta);

		if (isset($resultado)) {
			if(mysqli_num_rows($resultado) > 0) {
				return mysqli_fetch_assoc($resultado);
			} else {
				$vacio = [];
				return $vacio;
			}
		} else {
			$vacio = [];
			return $vacio;
		}

		mysqli_close($conexion);
	}

	//Da de alta una empresa con los datos introducidos por pantalla
	function altaEmpresa($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "INSERT INTO `empresa`(`cif`,  `nombre`, `telefono`, `email`, `direccion`) VALUES ('".
		$datos['cif']."','".
		$datos['nombre']."','".
		$datos['telefono']."','".
		$datos['email']."','".
		$datos['direccion']."')";

		echo $consulta;

		$resultado = mysqli_query($conexion, $consulta);
		var_dump($resultado);

		mysqli_close($conexion);
	}

	//Modifica la empresa con los datos introducidos por pantalla

	function modEmpresa($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "UPDATE `empresa` SET 
		`cif`='".$datos['cif']."',
		`nombre`='".$datos['nombre']."',
		`telefono`='".$datos['telefono']."',
		`email`='".$datos['email']."',
		`direccion`='".$datos['direccion']."' WHERE id = ".$datos['id'];


		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}

	//Elimina una empresa por su ID

	function eliminarEmpresa($id) {

		$conexion = crearConexion("asdete");

		$consulta = "DELETE FROM empresa WHERE id = ".$id;

		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}
	


	//Da de alta una empresa con los datos introducidos por pantalla
	function altaAdmin($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "INSERT INTO `administradores`(`cif`,  `nombre`, `telefono`, `email`, `direccion`) VALUES ('".
		$datos['cif']."','".
		$datos['nombre']."','".
		$datos['telefono']."','".
		$datos['email']."','".
		$datos['direccion']."')";

		echo $consulta;

		$resultado = mysqli_query($conexion, $consulta);
		var_dump($resultado);

		mysqli_close($conexion);
	}

	//Modifica la empresa con los datos introducidos por pantalla

	function modAdmin($datos) {
		$conexion = crearConexion("asdete");

		$consulta = "UPDATE `administradores` SET 
		`cif`='".$datos['cif']."',
		`nombre`='".$datos['nombre']."',
		`telefono`='".$datos['telefono']."',
		`email`='".$datos['email']."',
		`direccion`='".$datos['direccion']."' WHERE id = ".$datos['id'];


		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}

	//Elimina una empresa por su ID

	function eliminarAdmin($id) {

		$conexion = crearConexion("asdete");

		$consulta = "DELETE FROM administradores WHERE id = ".$id;

		$resultado = mysqli_query($conexion, $consulta);

		mysqli_close($conexion);
	}


	//Nos devuelve todos los afiliados de la base de datos
	function getAdministradores() {
		$conexion = crearConexion("asdete");

		$consulta = "SELECT * FROM administradores ORDER BY ID ASC";

		$resultado = mysqli_query($conexion, $consulta);

		return $resultado;

		mysqli_close($conexion);
	}
	

?>