<?php
 
  class SuperAdmin {

	//Constantes de la clase SuperAdmin
	const id ='id';
	const nickname ='nickname';
	const password ='password';
	const email ='email';

	//Creamos un array con todos los datos del SuperAdmin
	private $datos = [
		SuperAdmin::id=>'',
		SuperAdmin::nickname=>'',
		SuperAdmin::password=>'',
		SuperAdmin::email=>''
	];

	//Constructor de la clase
	 public function __construct(){
		$this->datos = [
			SuperAdmin::id=>'',
			SuperAdmin::nickname=>'',
			SuperAdmin::password=>'',
			SuperAdmin::email=>''
		];
	}

		//Recogemos los datos del SuperAdmin introducidos en formulario por el método POST
	public function loadPost() {
		$this->datos[SuperAdmin::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[SuperAdmin::nickname] =  isset($_POST['nickname']) ? $_POST['nickname'] : '';
		$this->datos[SuperAdmin::password] =  isset($_POST['password']) ? $_POST['password'] : '';
		$this->datos[SuperAdmin::email] =  isset($_POST['email']) ? $_POST['email'] : '';
	}

	//Cargamos los datos del SuperAdmin que se encuentran en base de datos
	public function loadBBDD($result) {
		$this->datos[SuperAdmin::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[SuperAdmin::nickname] =  isset($result['nickname']) ? $result['nickname'] : '';
		$this->datos[SuperAdmin::password] =  isset($result['password']) ? $result['password'] : '';
		$this->datos[SuperAdmin::email] =  isset($result['email']) ? $result['email'] : '';
	}

	//Métodos que nos devuelven los distintos datos uno por uno del SuperAdmin (GETTERS)

	public function getDatos() {
		return $this->datos;
	}
	public function getId() {
		return $this->datos[SuperAdmin::id];
	}
	public function getPassword() {
		return $this->datos[SuperAdmin::password];
	}
	public function getNombre() {
		return $this->datos[SuperAdmin::nombre];
	}
	public function getEmail() {
		return $this->datos[SuperAdmin::email];
	}


	//Validamos que el usuario y la contraseña se han introducido en el formulario

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[SuperAdmin::nickname]) == '') {
		$msgValidacion = "El NICK es obligatorio";
		} else if(trim($this->datos['password']) == '') {
		$msgValidacion = "La contraseña es obligatoria";
		} else if(trim($this->datos[SuperAdmin::email]) == '') {
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