<?php
 
  class Administrador {

	const id ='id';
	const nickname ='nickname';
	const password ='password';
	const email ='email';

	private $datos = [
		Administrador::id=>'',
		Administrador::nickname=>'',
		Administrador::password=>'',
		Administrador::email=>''
	];

	 public function __construct(){
		$this->datos = [
			Administrador::id=>'',
			Administrador::nickname=>'',
			Administrador::password=>'',
			Administrador::email=>''
		];
	}

	public function loadPost() {
		$this->datos[Administrador::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[Administrador::nickname] =  isset($_POST['nickname']) ? $_POST['nickname'] : '';
		$this->datos[Administrador::password] =  isset($_POST['password']) ? $_POST['password'] : '';
		$this->datos[Administrador::email] =  isset($_POST['email']) ? $_POST['email'] : '';
	}

	public function loadBBDD($result) {
		$this->datos[Administrador::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[Administrador::nickname] =  isset($result['nickname']) ? $result['nickname'] : '';
		$this->datos[Administrador::password] =  isset($result['password']) ? $result['password'] : '';
		$this->datos[Administrador::email] =  isset($result['email']) ? $result['email'] : '';
	}

	public function getDatos() {
		return $this->datos;
	}

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[Administrador::nickname]) == '') {
		$msgValidacion = "El NICK es obligatorio";
		} else if(trim($this->datos['password']) == '') {
		$msgValidacion = "La contraseña es obligatoria";
		} else if(trim($this->datos[Administrador::email]) == '') {
		$msgValidacion = "El email es obligatorio";
		}
		if(trim($this->datos['nickname']) != '') {
			$dat = new Datos();
			/*
			hacer validación de modificación de admins
			$afil_exist = $dat->getAfiliadoNIF($this->datos['nif']);
			$id_exist = isset($afil_exist['id']) ? $afil_exist['id'] : '';
			if($id_exist > 0 && $this->datos['id'] != $id_exist) {
				$msgValidacion = "Ya existe un afiliado con ese NIF.";
			}*/
		}
		return $msgValidacion;
	}




}
	


	
	

?>