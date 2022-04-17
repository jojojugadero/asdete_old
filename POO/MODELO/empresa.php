<?php
 
  class Empresa {

	//Constantes de la clase Empresa
	const id ='id';
	const cif ='cif';
	const nombre ='nombre';
	const telefono ='telefono';
	const email ='email';
	const direccion ='direccion';

	//Creamos un array con todos los datos de la Empresa
	private $datos = [
		Empresa::id=>'',
		Empresa::cif=>'',
		Empresa::nombre=>'',
		Empresa::telefono=>'',
		Empresa::email=>'',
		Empresa::direccion=>''
	];

		//Constructor de la clase
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

	//Método que nos devuelve la empresa por su ID
	public static function getEmpresaId($id){
		$dat = new Datos();
		$instance = new Empresa();
		$instance->loadBBDD($dat->getEmpresa($id));
		return $instance;
	}

	//Método que nos devuelve la empresa por su CIF
	public static function getEmpresaCif($nif){
		$dat = new Datos();
		$instance = new Empresa();
		$instance->loadBBDD($dat->getEmpresaCif($nif));
		return $instance;
	}
	//Método que nos devuelve todas las empresas en BBDD
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



	//Recogemos los datos de la empresa introducidos en formulario por el método POST

	public function loadPost() {
		$this->datos[Empresa::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[Empresa::cif] =  isset($_POST['cif']) ? $_POST['cif'] : '';
		$this->datos[Empresa::nombre] =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
		$this->datos[Empresa::telefono]=  isset($_POST['telefono']) ? $_POST['telefono'] : '';
		$this->datos[Empresa::email] =  isset($_POST['email']) ? $_POST['email'] : '';
		$this->datos[Empresa::direccion] =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
	}

	//Cargamos los datos de la empresa que se encuentran en base de datos
	public function loadBBDD($result) {
		$this->datos[Empresa::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[Empresa::cif] =  isset($result['cif']) ? $result['cif'] : '';
		$this->datos[Empresa::nombre] =  isset($result['nombre']) ? $result['nombre'] : '';
		$this->datos[Empresa::telefono]=  isset($result['telefono']) ? $result['telefono'] : '';
		$this->datos[Empresa::email] =  isset($result['email']) ? $result['email'] : '';
		$this->datos[Empresa::direccion] =  isset($result['direccion']) ? $result['direccion'] : '';
	}

	//Métodos que nos devuelven los distintos datos uno por uno de la empresa(GETTERS)
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

	//Validamos que hay datos en todos los siguientes campos y sino mostramos un mensaje al usuario
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
			$empre_exist = $dat->getEmpresaCif($this->datos[Empresa::cif]);
			$id_exist = isset($empre_exist['id']) ? $empre_exist['id'] : '';
			if($id_exist > 0 && $this->datos['id'] != $id_exist) {
				$msgValidacion = "Ya existe una empresa con ese CIF.";
			}
		}
		return $msgValidacion;
	}




}
	


	
	

?>