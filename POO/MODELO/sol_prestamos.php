<?php
 
  class SolPrestamo {

	const id ='id';
	const id_afiliados_fk ='id_afiliados_fk';
	const motivo='motivo';
	const cantidad ='cantidad';
	const estado ='estado';

	private $datos = [
		SolPrestamo::id=>'',
		SolPrestamo::id_afiliados_fk=>'',
		SolPrestamo::motivo=>'',
		SolPrestamo::cantidad=>'',
		SolPrestamo::estado=>''
	];

	 public function __construct(){
		$this->datos = [
			SolPrestamo::id=>'',
			SolPrestamo::id_afiliados_fk=>'',
			SolPrestamo::motivo=>'',
			SolPrestamo::cantidad=>'',
			SolPrestamo::estado=>''
		];
	}

	public static function getSolPrestamoId($id){
		$dat = new Datos();
		$instance = new getSolPrestamo();
		$instance->loadBBDD($dat->getSolPrestamo($id));
		return $instance;
	}
	public static function getSolPrestamos(){
		$dat = new Datos();
		$result = $dat->getSolPrestamos();
		$instances = [];
		foreach ($result as $fila) {
			$instance = new SolPrestamo();
			$instance->loadBBDD($fila);
			array_push($instances, $instance);
		}
		return $instances;
	}

	public function loadPost() {
		$this->datos[SolPrestamo::id] =  isset($_POST['id']) ? $_POST['id'] : '';
		$this->datos[SolPrestamo::id_afiliados_fk] =  isset($_POST['id_afiliados_fk']) ? $_POST['id_afiliados_fk'] : '';
		$this->datos[SolPrestamo::motivo] =  isset($_POST['motivo']) ? $_POST['motivo'] : '';
		$this->datos[SolPrestamo::cantidad]=  isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
		$this->datos[SolPrestamo::estado] =  isset($_POST['estado']) ? $_POST['estado'] : '';
	}

	public function loadBBDD($result) {
		$this->datos[SolPrestamo::id] =  isset($result['id']) ? $result['id'] : '';
		$this->datos[SolPrestamo::id_afiliados_fk] =  isset($result['id_afiliados_fk']) ? $result['id_afiliados_fk'] : '';
		$this->datos[SolPrestamo::motivo] =  isset($result['motivo']) ? $result['motivo'] : '';
		$this->datos[SolPrestamo::cantidad]=  isset($result['cantidad']) ? $result['cantidad'] : '';
		$this->datos[SolPrestamo::estado] =  isset($result['estado']) ? $result['estado'] : '';
	}

	public function getDatos() {
		return $this->datos;
	}
	public function getId() {
		return $this->datos[SolPrestamo::id];
	}
	public function getIdAfiliado() {
		return $this->datos[SolPrestamo::id_afiliados_fk];
	}
	public function getMotivo() {
		return $this->datos[SolPrestamo::motivo];
	}
	public function getCantidad() {
		return $this->datos[SolPrestamo::cantidad];
	}
	public function getEstado() {
		return $this->datos[SolPrestamo::estado];
	}

	public function setEstadoPendiente() {
		$this->datos[SolPrestamo::estado] = "Pendiente";
	}
	public function setEstadoAceptado() {
		$this->datos[SolPrestamo::estado] = "Aceptado";
	}
	public function setEstadoRechazado() {
		$this->datos[SolPrestamo::estado] = "Rechazado";
	}

	public function validar() {
		$msgValidacion = "";
		if(trim($this->datos[SolPrestamo::id_afiliados_fk]) == '') {
		$msgValidacion = "El afiliado es obligatorio";
		} else if(trim($this->datos[SolPrestamo::motivo]) == '') {
		$msgValidacion = "El motivo es obligatorio";
		} else if(trim($this->datos[SolPrestamo::cantidad]) == '') {
		$msgValidacion = "La cantidad es obligatorio";
		}
		return $msgValidacion;
	}




}
	


	
	

?>