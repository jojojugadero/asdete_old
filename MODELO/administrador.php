<?php
 
  class Administrador {

	//Constantes de la clase Administrador
	const id ='id';
	const nickname ='nickname';
	const password ='password';
	const email ='email';

	//Array de datos con las constantes de Administrador
	private $datos = [
		Administrador::id=>'',
		Administrador::nickname=>'',
		Administrador::password=>'',
		Administrador::email=>''
	];

	//Constructor de la clase
	 public function __construct(){
		$this->datos = [
			Administrador::id=>'',
			Administrador::nickname=>'',
			Administrador::password=>'',
			Administrador::email=>''
		];
	}

	//Método que nos devuelve el administrador por su ID
	public static function getAdministradorId($id){
		$dat = new Datos();
		$instance = new Administrador();
		$instance->loadBBDD($dat->getAdministradorId($id));
		return $instance;
	}

	//Método que nos devuelve el administrador por su NIF
	public static function getAdministradorNif($nif){
		$dat = new Datos();
		$instance = new Administrador();
		$instance->loadBBDD($dat->getAdministradorNif($nif));
		return $instance;
	}
	//Método que nos devuelve todos los administradores
	public static function getAdministradores(){
		$dat = new Datos();
		$result = $dat->getAdministradores();
		$instances = [];
		foreach ($result as $fila) {
			$instance = new Administrador();
			$instance->loadBBDD($fila);
			array_push($instances, $instance);
		}
		return $instances;
	}

	//Recogemos los datos que nos llegan por POST
	public function loadPost() {
		$this->datos[Administrador::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[Administrador::nickname] =  isset($_POST['nickname']) ? $_POST['nickname'] : '';
		$this->datos[Administrador::password] =  isset($_POST['password']) ? $_POST['password'] : '';
		$this->datos[Administrador::email] =  isset($_POST['email']) ? $_POST['email'] : '';
	}

	//Cargamos los datos que nos llegan por base de datos
	public function loadBBDD($result) {
		$this->datos[Administrador::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[Administrador::nickname] =  isset($result['nickname']) ? $result['nickname'] : '';
		$this->datos[Administrador::password] =  isset($result['password']) ? $result['password'] : '';
		$this->datos[Administrador::email] =  isset($result['email']) ? $result['email'] : '';
	}

	//Métodos que nos devuelven los distintos datos uno por uno del Admin (GETTERS)
	public function getDatos() {
		return $this->datos;
	}
	public function getId() {
		return $this->datos[Administrador::id];
	}
	public function getPassword() {
		return $this->datos[Administrador::password];
	}
	public function getNickname() {
		return $this->datos[Administrador::nickname];
	}
	public function getEmail() {
		return $this->datos[Administrador::email];
	}

	//Validamos que hay datos en todos los siguientes campos y sino mostramos un mensaje al usuario en la vista
	//En el login
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
			
			$admin_exist = $dat->getAdministradorNick($this->datos[Administrador::nickname]);
			$id_exist = isset($admin_exist['id']) ? $admin_exist['id'] : '';
			if($id_exist > 0 && $this->datos['id'] != $id_exist) {
				$msgValidacion = "Ya existe un administrador con ese nick.";
			}
		}
		return $msgValidacion;
	}




}
	


	
	

?>