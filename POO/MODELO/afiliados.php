<?php
 
  class Afiliados {

	const id ='id';
	const nif ='nif';
	const password ='password';
	const nombre ='nombre';
	const apellido1 ='apellido1';
	const apellido2 ='apellido2';
	const telefono ='telefono';
	const email ='email';
	const direccion ='direccion';
	const id_empresa_fk ='id_empresa_fk';

	private $datos = [
		Afiliados::id=>'',
		Afiliados::nif=>'',
		Afiliados::password=>'',
		Afiliados::nombre=>'',
		Afiliados::apellido1=>'',
		Afiliados::apellido2=>'',
		Afiliados::telefono=>'',
		Afiliados::email=>'',
		Afiliados::direccion=>'',
		Afiliados::id_empresa_fk=>'',
	];

	 public function __construct(){
		$this->datos = [
			Afiliados::id=>'',
			Afiliados::nif=>'',
			Afiliados::password=>'',
			Afiliados::nombre=>'',
			Afiliados::apellido1=>'',
			Afiliados::apellido2=>'',
			Afiliados::telefono=>'',
			Afiliados::email=>'',
			Afiliados::direccion=>'',
			Afiliados::id_empresa_fk=>'',
		];
	}

	public function loadPost() {
		$this->datos[Afiliados::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[Afiliados::nif] =  isset($_POST['nif']) ? $_POST['nif'] : '';
		$this->datos[Afiliados::password] =  isset($_POST['password']) ? $_POST['password'] : '';
		$this->datos[Afiliados::nombre] =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
		$this->datos[Afiliados::apellido1] =  isset($_POST['ape1']) ? $_POST['ape1'] : '';
		$this->datos[Afiliados::apellido2] =  isset($_POST['ape2']) ? $_POST['ape2'] : '';
		$this->datos[Afiliados::telefono]=  isset($_POST['telefono']) ? $_POST['telefono'] : '';
		$this->datos[Afiliados::email] =  isset($_POST['email']) ? $_POST['email'] : '';
		$this->datos[Afiliados::direccion] =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
		$this->datos[Afiliados::id_empresa_fk] =  isset($_POST['empresa']) ? $_POST['empresa'] : '';
	}

	public function loadBBDD($result) {
		$this->datos[Afiliados::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[Afiliados::nif] =  isset($result['nif']) ? $result['nif'] : '';
		$this->datos[Afiliados::password] =  isset($result['password']) ? $result['password'] : '';
		$this->datos[Afiliados::nombre] =  isset($result['nombre']) ? $result['nombre'] : '';
		$this->datos[Afiliados::apellido1] =  isset($result['ape1']) ? $result['ape1'] : '';
		$this->datos[Afiliados::apellido2] =  isset($result['ape2']) ? $result['ape2'] : '';
		$this->datos[Afiliados::telefono]=  isset($result['telefono']) ? $result['telefono'] : '';
		$this->datos[Afiliados::email] =  isset($result['email']) ? $result['email'] : '';
		$this->datos[Afiliados::direccion] =  isset($result['direccion']) ? $result['direccion'] : '';
		$this->datos[Afiliados::id_empresa_fk] =  isset($result['id_empresa_fk']) ? $result['id_empresa_fk'] : '';
	}

	public function getDatos() {
		return $this->datos;
	}

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[Afiliados::nif]) == '') {
		$msgValidacion = "El NIF es obligatorio";
		} else if(trim($this->datos['password']) == '') {
		$msgValidacion = "La contraseña es obligatoria";
		} else if(trim($this->datos['nombre']) == '') {
		$msgValidacion = "El nombre es obligatorio";
		} else if(trim($this->datos[Afiliados::apellido1]) == '') {
		$msgValidacion = "El apellido 1 es obligatorio";
		} else if(trim($this->datos[Afiliados::apellido2]) == '') {
		$msgValidacion = "El apellido 2 es obligatorio";
		} else if(trim($this->datos[Afiliados::telefono]) == '') {
		$msgValidacion = "El teléfono es obligatorio";
		} else if(trim($this->datos[Afiliados::email]) == '') {
		$msgValidacion = "El email es obligatorio";
		} else if(trim($this->datos[Afiliados::direccion]) == '') {
		$msgValidacion = "La dirección es obligatorio";
		} else if(trim($this->datos[Afiliados::id_empresa_fk]) == '') {
		$msgValidacion = "La empresa es obligatorio";
		}
		if(trim($this->datos['nif']) != '') {
			$dat = new Datos();
			$afil_exist = $dat->getAfiliadoNIF($this->datos['nif']);
			$id_exist = isset($afil_exist['id']) ? $afil_exist['id'] : '';
			if($id_exist > 0 && $this->datos['id'] != $id_exist) {
				$msgValidacion = "Ya existe un afiliado con ese NIF.";
			}
		}
		return $msgValidacion;
	}




}
	


	
	

?>