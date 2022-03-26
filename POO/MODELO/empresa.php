<?php
 
  class Empresa {

	const id ='id';
	const cif ='cif';
	const nombre ='nombre';
	const telefono ='telefono';
	const email ='email';
	const direccion ='direccion';

	private $datos = [
		Empresa::id=>'',
		Empresa::cif=>'',
		Empresa::nombre=>'',
		Empresa::telefono=>'',
		Empresa::email=>'',
		Empresa::direccion=>''
	];

	 public function __construct(){
		$this->datos = [
			Empresa::id=>'',
			Empresa::cif=>'',
			Empresa::nombre=>'',
			Empresa::telefono=>'',
			Empresa::email=>'',
			Empresa::direccion=>''
		];
	}

	public static function getEmpresaId($id){
		$dat = new Datos();
		$instance = new Empresa();
		$instance->loadBBDD($dat->getEmpresa($id));
		return $instance;
	}

	public static function getEmpresaCif($nif){
		$dat = new Datos();
		$instance = new Empresa();
		$instance->loadBBDD($dat->getEmpresaCif($nif));
		return $instance;
	}
	public static function getEmpresas(){
		$dat = new Datos();
		$result = $dat->getEmpresas();
		$instances = [];
		foreach ($result as $fila) {
			$instance = new Empresa();
			$instance->loadBBDD($fila);
			array_push($instances, $instance);
		}
		return $instances;
	}

	public function loadPost() {
		$this->datos[Empresa::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[Empresa::cif] =  isset($_POST['cif']) ? $_POST['cif'] : '';
		$this->datos[Empresa::nombre] =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
		$this->datos[Empresa::telefono]=  isset($_POST['telefono']) ? $_POST['telefono'] : '';
		$this->datos[Empresa::email] =  isset($_POST['email']) ? $_POST['email'] : '';
		$this->datos[Empresa::direccion] =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
	}

	public function loadBBDD($result) {
		$this->datos[Empresa::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[Empresa::cif] =  isset($result['cif']) ? $result['cif'] : '';
		$this->datos[Empresa::nombre] =  isset($result['nombre']) ? $result['nombre'] : '';
		$this->datos[Empresa::telefono]=  isset($result['telefono']) ? $result['telefono'] : '';
		$this->datos[Empresa::email] =  isset($result['email']) ? $result['email'] : '';
		$this->datos[Empresa::direccion] =  isset($result['direccion']) ? $result['direccion'] : '';
	}

	public function getDatos() {
		return $this->datos;
	}
	public function getId() {
		return $this->datos[Empresa::id];
	}
	public function getCif() {
		return $this->datos[Empresa::cif];
	}
	public function getNombre() {
		return $this->datos[Empresa::nombre];
	}
	public function getTelefono() {
		return $this->datos[Empresa::telefono];
	}
	public function getEmail() {
		return $this->datos[Empresa::email];
	}
	public function getDireccion() {
		return $this->datos[Empresa::direccion];
	}

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[Empresa::cif]) == '') {
		$msgValidacion = "El CIF es obligatorio";
		} else if(trim($this->datos['nombre']) == '') {
		$msgValidacion = "El nombre es obligatorio";
		} else if(trim($this->datos[Empresa::telefono]) == '') {
		$msgValidacion = "El teléfono es obligatorio";
		} else if(trim($this->datos[Empresa::email]) == '') {
		$msgValidacion = "El email es obligatorio";
		} else if(trim($this->datos[Empresa::direccion]) == '') {
		$msgValidacion = "La dirección es obligatorio";
		}
		if(trim($this->datos[Empresa::cif]) != '') {
			$dat = new Datos();
			
			/*
			hacer validación de mod. empresa
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