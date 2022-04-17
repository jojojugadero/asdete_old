<?php
 
  class SolAfiliados extends Afiliados {

	const id_afiliados_fk ='id_afiliados_fk';

	private $datos = [
		SolAfiliados::id=>'',
		SolAfiliados::id_afiliados_fk=>'',
		SolAfiliados::nif=>'',
		SolAfiliados::password=>'',
		SolAfiliados::nombre=>'',
		SolAfiliados::apellido1=>'',
		SolAfiliados::apellido2=>'',
		SolAfiliados::telefono=>'',
		SolAfiliados::email=>'',
		SolAfiliados::direccion=>'',
		SolAfiliados::id_empresa_fk=>'',
	];

	 public function __construct(){
		$this->datos = [
			SolAfiliados::id=>'',
			SolAfiliados::id_afiliados_fk=>'',
			SolAfiliados::nif=>'',
			SolAfiliados::password=>'',
			SolAfiliados::nombre=>'',
			SolAfiliados::apellido1=>'',
			SolAfiliados::apellido2=>'',
			SolAfiliados::telefono=>'',
			SolAfiliados::email=>'',
			SolAfiliados::direccion=>'',
			SolAfiliados::id_empresa_fk=>'',
		];
	}

	public static function getSolAfiliadoId($id){
		$dat = new Datos();
		$instance = new SolAfiliados();
		$instance->loadBBDD($dat->getSolAfiliado($id));
		return $instance;
	}
	public static function getSolAfiliados(){
		$dat = new Datos();
		$result = $dat->getSolAfiliados();
		$instances = [];
		foreach ($result as $fila) {
			$instance = new SolAfiliados();
			$instance->loadBBDD($fila);
			array_push($instances, $instance);
		}
		return $instances;
	}


	public function loadPost() {
		//$this->datos[SolAfiliados::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[SolAfiliados::id_afiliados_fk] =  isset($_POST['id_afiliados_fk']) ? $_POST['id_afiliados_fk'] : '';
		$this->datos[SolAfiliados::nif] =  isset($_POST['nif']) ? $_POST['nif'] : '';
		$this->datos[SolAfiliados::password] =  isset($_POST['password']) ? $_POST['password'] : '';
		$this->datos[SolAfiliados::nombre] =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
		$this->datos[SolAfiliados::apellido1] =  isset($_POST['ape1']) ? $_POST['ape1'] : '';
		$this->datos[SolAfiliados::apellido2] =  isset($_POST['ape2']) ? $_POST['ape2'] : '';
		$this->datos[SolAfiliados::telefono]=  isset($_POST['telefono']) ? $_POST['telefono'] : '';
		$this->datos[SolAfiliados::email] =  isset($_POST['email']) ? $_POST['email'] : '';
		$this->datos[SolAfiliados::direccion] =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
		$this->datos[SolAfiliados::id_empresa_fk] =  isset($_POST['empresa']) ? $_POST['empresa'] : '';
	}

	public function loadBBDD($result) {
		$this->datos[SolAfiliados::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[SolAfiliados::id_afiliados_fk] =  isset($result['id_afiliados_fk']) ? $result['id_afiliados_fk'] : '';
		$this->datos[SolAfiliados::nif] =  isset($result['nif']) ? $result['nif'] : '';
		$this->datos[SolAfiliados::password] =  isset($result['password']) ? $result['password'] : '';
		$this->datos[SolAfiliados::nombre] =  isset($result['nombre']) ? $result['nombre'] : '';
		$this->datos[SolAfiliados::apellido1] =  isset($result['apellido1']) ? $result['apellido1'] : '';
		$this->datos[SolAfiliados::apellido2] =  isset($result['apellido2']) ? $result['apellido2'] : '';
		$this->datos[SolAfiliados::telefono]=  isset($result['telefono']) ? $result['telefono'] : '';
		$this->datos[SolAfiliados::email] =  isset($result['email']) ? $result['email'] : '';
		$this->datos[SolAfiliados::direccion] =  isset($result['direccion']) ? $result['direccion'] : '';
		$this->datos[SolAfiliados::id_empresa_fk] =  isset($result['id_empresa_fk']) ? $result['id_empresa_fk'] : '';
	}

	public function getDatos() {
		return $this->datos;
	}

	public function getId() {
		return $this->datos[SolAfiliados::id];
	}
	public function getIdAfiliado() {
		return $this->datos[SolAfiliados::id_afiliados_fk];
	}
	public function getNif() {
		return $this->datos[SolAfiliados::nif];
	}
	public function getPassword() {
		return $this->datos[SolAfiliados::password];
	}
	public function getNombre() {
		return $this->datos[SolAfiliados::nombre];
	}
	public function getApellido1() {
		return $this->datos[SolAfiliados::apellido1];
	}
	public function getApellido2() {
		return $this->datos[SolAfiliados::apellido2];
	}
	public function getTelefono() {
		return $this->datos[SolAfiliados::telefono];
	}
	public function getEmail() {
		return $this->datos[SolAfiliados::email];
	}
	public function getDireccion() {
		return $this->datos[SolAfiliados::direccion];
	}
	public function getIdEmpresa() {
		return $this->datos[SolAfiliados::id_empresa_fk];
	}

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[SolAfiliados::nif]) == '') {
		$msgValidacion = "El NIF es obligatorio";
		} else if(trim($this->datos['password']) == '') {
		$msgValidacion = "La contraseña es obligatoria";
		} else if(trim($this->datos['nombre']) == '') {
		$msgValidacion = "El nombre es obligatorio";
		} else if(trim($this->datos[SolAfiliados::apellido1]) == '') {
		$msgValidacion = "El apellido 1 es obligatorio";
		} else if(trim($this->datos[SolAfiliados::apellido2]) == '') {
		$msgValidacion = "El apellido 2 es obligatorio";
		} else if(trim($this->datos[SolAfiliados::telefono]) == '') {
		$msgValidacion = "El teléfono es obligatorio";
		} else if(trim($this->datos[SolAfiliados::email]) == '') {
		$msgValidacion = "El email es obligatorio";
		} else if(trim($this->datos[SolAfiliados::direccion]) == '') {
		$msgValidacion = "La dirección es obligatorio";
		} else if(trim($this->datos[SolAfiliados::id_empresa_fk]) == '') {
		$msgValidacion = "La empresa es obligatorio";
		}
		if(trim($this->datos[SolAfiliados::nif]) != '') {
			$dat = new Datos();
			$afil_exist = $dat->getAfiliadoNIF($this->datos[SolAfiliados::nif]);
			$id_exist = isset($afil_exist[Afiliados::id]) ? $afil_exist[Afiliados::id] : '';
			if($id_exist > 0 && $this->datos[SolAfiliados::id_afiliados_fk] != $id_exist) {
				$msgValidacion = "Ya existe un afiliado con ese NIF.";
			}
		}
		return $msgValidacion;
	}

}

?>