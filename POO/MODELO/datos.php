<?php
  class Datos implements Conexion {

		// Datos de conexión
/*	var	$host = "localhost";
	var	$user = "root";
	var	$password = "";
	//Nombre BBDD
	var $baseDatos = "asdete";*/

				public function __construct(){

				}

					//Función para crear la conexión a base de datos
					public function crearConexion($database) {

						// Datos de conexión
						$host = "localhost";
						$user = "root";
						$password = "";
				
						// Establecemos la conexión con la base de datos
						$conexion = mysqli_connect($host, $user, $password, $database);
				
						return $conexion;
					}

					//------------------------------------------AFILIADO-----------------------------------------------------------------//
					
					//Verificamos el nombre del afiliado en base de datos
				
					public function existeUsuario($nombre){
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
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
					public function verificaPass($nombre,$pass){
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
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
					public function getAfiliadoLogin($nombre,$pass){
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "SELECT * FROM afiliados WHERE nombre = '" . $nombre . "' and password = '" . $pass . "'";
						
						$resultado = mysqli_query($conexion, $consulta);
				
						return mysqli_fetch_assoc($resultado);
				
						mysqli_close($conexion);
					}

					
						//Da de alta un afiliado con los datos introducidos por pantalla
						public function altaAfiliado($datos) {
							$dat = new Datos();
							$conexion = $dat->crearConexion("asdete");
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
				
					public function modAfiliado($datos) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
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
				
					public function eliminarAfiliado($id) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "DELETE FROM afiliados WHERE id = ".$id;
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}

				          //Nos devuelve todos los afiliados de la base de datos
							public function getAfiliados() {
								$dat = new Datos();
								$conexion = $dat->crearConexion("asdete");
						
								$consulta = "SELECT * FROM afiliados ORDER BY ID ASC";
						
								$resultado = mysqli_query($conexion, $consulta);
						
								return $resultado;
						
								mysqli_close($conexion);
							}


							//Nos devuelve todos los datos del afiliado a través de su ID
							public function getAfiliado($id) {
								$dat = new Datos();
								$conexion = $dat->crearConexion("asdete");
								$consulta = "SELECT * FROM afiliados WHERE id = ".$id;
						
								$resultado = mysqli_query($conexion, $consulta);
						
								if (isset($resultado)) {
									if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
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
							public function getAfiliadoNIF($nif) {
								$dat = new Datos();
								$conexion = $dat->crearConexion("asdete");
						
								$consulta = "SELECT * FROM afiliados WHERE nif = '".$nif."'";
						
								$resultado = mysqli_query($conexion, $consulta);
								if (!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
									return mysqli_fetch_assoc($resultado);
								} else {
									$vacio = [];
									return $vacio;
								}
						
								mysqli_close($conexion);
							}


			//------------------------------------------PRESTAMOS AFILIADOS-----------------------------------------------------------------//
	
					//Da de alta la solicitud de un prestamo
					public function altaSolPrestamos($datos) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
						$consulta = "INSERT INTO `sol_prestamos`(`id_afiliados_fk`, `motivo`, `cantidad`, `estado`) VALUES ('".
						$datos['id_afiliados_fk']."','".
						$datos['motivo']."','".
						$datos['cantidad']."','".
						$datos['estado']."')";
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}

					
					//Nos devuelve todos las solicitudes de prestamos afiliados de la base de datos
					public function getSolPrestamos() {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "SELECT * FROM sol_prestamos ORDER BY ID ASC";
				
						$resultado = mysqli_query($conexion, $consulta);
				
						return $resultado;
				
						mysqli_close($conexion);
					}


					
					//Nos devuelve todas las solicitudes de prestamos a través del ID del afiliado
					public function getSolPrestamo($id) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
						$consulta = "SELECT * FROM sol_prestamos WHERE id = ".$id;
				
						$resultado = mysqli_query($conexion, $consulta);
				
						if (isset($resultado)) {
							if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
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

					//Modifica la solicitud de los prestamos de los afiliados con los datos introducidos por pantalla
				
					public function modSolPrestamos($datos) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "UPDATE `sol_prestamos` SET 
						`id_afiliados_fk`='".$datos['id_afiliados_fk']."',
						`motivo`='".$datos['motivo']."',
						`cantidad`='".$datos['cantidad']."',
						`estado`='".$datos['estado']."' WHERE id = ".$datos['id'];
				
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}
					

				//Elimina los prestamos de un afiliado por su ID 
				public function eliminarPrestamosIdAfil($id_afil) {
					$dat = new Datos();
					$conexion = $dat->crearConexion("asdete");
			
					$consulta = "DELETE FROM sol_prestamos WHERE id_afiliados_fk = ".$id_afil;
			
					$resultado = mysqli_query($conexion, $consulta);
			
					mysqli_close($conexion);
				}



			//------------------------------------------SOLICITUD CAMBIO DATOS EMPLEADOS-----------------------------------------------------------------//
	
	
		
	
		//Nos devuelve todas  las solicitudes de cambios de datos personales de los afiliados
		public function getSolAfiliados() {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
	
			$consulta = "SELECT * FROM sol_afiliados ORDER BY ID ASC";
	
			$resultado = mysqli_query($conexion, $consulta);
	
			return $resultado;
	
			mysqli_close($conexion);
		}

				
		//Nos devuelve todas las solicitudes de cambios de datos del afiliado a través de su ID
		public function getSolAfiliado($id) {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
			$consulta = "SELECT * FROM sol_afiliados WHERE id = ".$id;
	
			$resultado = mysqli_query($conexion, $consulta);
	
			if (isset($resultado)) {
				if(!empty($resultado) AND mysqli_num_rows($resultado) > 0) {
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


			//Elimina una solicitud de cambio de datos del afiliado por su ID
	
			public function eliminarSolAfiliado($id) {
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
		
				$consulta = "DELETE FROM sol_afiliados WHERE id = ".$id;
		
				$resultado = mysqli_query($conexion, $consulta);
		
				mysqli_close($conexion);
			}
			
			//Elimina una solicitud de cambio de datos del afiliado por su ID 
			public function eliminarSolAfiliadoIdAfil($id_afil) {
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
		
				$consulta = "DELETE FROM sol_afiliados WHERE id_afiliados_fk = ".$id_afil;
		
				$resultado = mysqli_query($conexion, $consulta);
		
				mysqli_close($conexion);
			}
			
			//Da de alta una solicitud de cambio de datos del afiliado con los datos introducidos por pantalla
			public function altaSolAfiliado($datos) {
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
				$consulta = "INSERT INTO `sol_afiliados`(`id_afiliados_fk`, `nif`, `password`, `nombre`, `apellido1`, `apellido2`, `telefono`, `email`, `direccion`, `id_empresa_fk`) VALUES ('".
				$datos['id_afiliados_fk']."','".
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
		
		
	
			
	
				//------------------------------------------ADMINISTRADORES-----------------------------------------------------------------//


				//Comprobamos que el nombre del administrador del sindicato sea correcto
				public function existeAdmin($nombre){
					$dat = new Datos();
					$conexion = $dat->crearConexion("asdete");
			
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
	
					//Verificamos que el password del administrador del sindicato sea correcto en base de datos
					public function verificaPassAdmin($nombre,$pass){
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "SELECT * FROM administradores WHERE nickname = '" . $nombre . "' and password = '" . $pass . "'";
						
						$resultado = mysqli_query($conexion, $consulta);
				
						if (mysqli_num_rows($resultado) > 0) {
							return true;
							
						} else {
							return false;
							
						}
				
						mysqli_close($conexion);
					}

					//Damos de alta a un administrador
					public function altaAdmin($datos) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "INSERT INTO `administradores`(`nickname`,  `password`,  `email`) VALUES ('".
						$datos['nickname']."','".
						$datos['password']."','".
						$datos['email']."')";
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}

					//Modificamos los datos de un administrador
					public function modAdmin($datos) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
						$consulta = "UPDATE `administradores` SET 
						`nickname`='".$datos['nickname']."',
						`password`='".$datos['password']."',
						`email`='".$datos['email']."' WHERE id = ".$datos['id'];
				
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}

					
					//Elimina un Administrador por su ID
				
					public function eliminarAdmin($id) {
				
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "DELETE FROM administradores WHERE id = ".$id;
				
						$resultado = mysqli_query($conexion, $consulta);
				
						mysqli_close($conexion);
					}


					//Nos devuelve todos los administradores de la base de datos
					public function getAdministradores() {
				
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
						$consulta = "SELECT * FROM administradores ORDER BY ID ASC";
				
						$resultado = mysqli_query($conexion, $consulta);
				
						return $resultado;
				
						mysqli_close($conexion);
					}
				
					//Nos devuelve todos los datos del administrador a través de su NICK
					public function getAdministradorNick($nick) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
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
					
					
					//Nos devuelve todos los datos de un administrador a través de su ID
					public function getAdministradorId($id) {
						$dat = new Datos();
						$conexion = $dat->crearConexion("asdete");
				
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

		

		//------------------------------------------SUPER ADMINISTRADORES-----------------------------------------------------------------//
		
			//Comprobamos que el nombre del SUPERADMIN sea correcto
	
			public function existeSuperAdmin($nombre){
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
		
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
		
			//Verificamos que el password del SUPERADMIN del sindicato sea correcto en base de datos
			public function verificaPassSuperAdmin($nombre,$pass){
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
		
				$consulta = "SELECT * FROM superadmin WHERE nickname = '" . $nombre . "' and password = '" . $pass . "'";
				
				$resultado = mysqli_query($conexion, $consulta);
		
				if (mysqli_num_rows($resultado) > 0) {
					return true;
					
				} else {
					return false;
					
				}
		
				mysqli_close($conexion);
			}
		
		
		
				//------------------------------------------EMPRESAS-----------------------------------------------------------------//

		
		

			//Nos devuelve todas las empresas de la base de datos
	
			public function getEmpresas() {
				$dat = new Datos();
				$conexion = $dat->crearConexion("asdete");
		
				$consulta = "SELECT * FROM empresa";
		
				$resultado = mysqli_query($conexion, $consulta);
		
				return $resultado;
		
				mysqli_close($conexion);
			}
		
	
		//Nos devuelve todos los datos de una empresa a través de su ID
		public function getEmpresa($id) {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
	
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
	
	
		//Nos devuelve todos los datos de la empresa a través de su CIF
		public function getEmpresaCif($cif) {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
	
			$consulta = "SELECT * FROM empresa WHERE cif = '".$cif."'";
	
			$resultado = mysqli_query($conexion, $consulta);
			if (mysqli_num_rows($resultado) > 0) {
				return mysqli_fetch_assoc($resultado);
			} else {
				$vacio = [];
				return $vacio;
			}
	
			mysqli_close($conexion);
		}
	
	
		
	
		//Da de alta una empresa con los datos introducidos por pantalla
		public function altaEmpresa($datos) {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
	
			$consulta = "INSERT INTO `empresa`(`cif`,  `nombre`, `telefono`, `email`, `direccion`) VALUES ('".
			$datos['cif']."','".
			$datos['nombre']."','".
			$datos['telefono']."','".
			$datos['email']."','".
			$datos['direccion']."')";
	
			$resultado = mysqli_query($conexion, $consulta);
	
			mysqli_close($conexion);
		}
	
		//Modifica la empresa con los datos introducidos por pantalla
	
		public function modEmpresa($datos) {
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
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
	
		public function eliminarEmpresa($id) {
	
			$dat = new Datos();
			$conexion = $dat->crearConexion("asdete");
	
			$consulta = "DELETE FROM empresa WHERE id = ".$id;
	
			$resultado = mysqli_query($conexion, $consulta);
	
			mysqli_close($conexion);
		}
		
	
	




}
	


	
	

?>