


<?php




public class AppAdministra{

    public function __construct(){

	}
    
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

include $incRoot.'POO/MODELO/datos.php';

function compruebaSession(){

    if(isset($_SESSION['personal_sesion']) == 'personal_sesion') {
        //$url1 = $dirRoot."MVC_TOCAR\VISTA\ADMINISTRADORES\appAdmin.php";
        //header('Location: '.$url1);
      } else {
        $url2 =$dirRoot."MVC_TOCAR/VISTA/index.php";
        header('Location: '.$url2);
      }
}

function varCrud(){
    $id =  isset($_POST['id']) ? $_POST['id'] : '';
    $nif =  isset($_POST['nif']) ? $_POST['nif'] : '';
    $password =  isset($_POST['password']) ? $_POST['password'] : '';
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $ape1 =  isset($_POST['ape1']) ? $_POST['ape1'] : '';
    $ape2 =  isset($_POST['ape2']) ? $_POST['ape2'] : '';
    $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $email =  isset($_POST['email']) ? $_POST['email'] : '';
    $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $id_empresa =  isset($_POST['empresa']) ? $_POST['empresa'] : '';
}

function varOnClick(){
    $swinsertar =  isset($_POST['swinsertar']) ? $_POST['swinsertar'] : '';
  $swmodificar =  isset($_POST['swmodificar']) ? $_POST['swmodificar'] : '';
  $swmodificarapply =  isset($_POST['swmodificarapply']) ? $_POST['swmodificarapply'] : '';
  $sweliminar =  isset($_POST['sweliminar']) ? $_POST['sweliminar'] : '';
}


function recogeDatosBBDD(){
    $datos['id'] = $id;
    $datos['nif'] = $nif;
    $datos['password'] = $password;
    $datos['nombre'] = $nombre;
    $datos['apellido1'] = $ape1;
    $datos['apellido2'] = $ape2;
    $datos['telefono'] = $telefono;
    $datos['email'] = $email;
    $datos['direccion'] = $direccion;
    $datos['id_empresa_fk'] = $id_empresa;
}

function validaciones(){
    $msgValidacion = "";
    if($swinsertar == 'S' || $swmodificarapply == 'S') {
      if(trim($nif) == '') {
        $msgValidacion = "El NIF es obligatorio";
      } else if(trim($password) == '') {
        $msgValidacion = "La contraseña es obligatoria";
      } else if(trim($nombre) == '') {
        $msgValidacion = "El nombre es obligatorio";
      } else if(trim($ape1) == '') {
        $msgValidacion = "El apellido 1 es obligatorio";
      } else if(trim($ape2) == '') {
        $msgValidacion = "El apellido 2 es obligatorio";
      } else if(trim($telefono) == '') {
        $msgValidacion = "El teléfono es obligatorio";
      } else if(trim($email) == '') {
        $msgValidacion = "El email es obligatorio";
      } else if(trim($direccion) == '') {
        $msgValidacion = "La dirección es obligatorio";
      } else if(trim($id_empresa) == '') {
        $msgValidacion = "La empresa es obligatorio";
      }
      if(trim($nif) != '') {
        $afil_exist = $datos->getAfiliadoNIF($nif);
        $id_exist = isset($afil_exist['id']) ? $afil_exist['id'] : '';
        if($id_exist > 0 && $id != $id_exist) {
          $msgValidacion = "Ya existe un afiliado con ese NIF.";
        }
      }
      if(trim($msgValidacion) != "") {
        $afil_modi = $datos;
      }
    }
    if(trim($msgValidacion) == "" && $swmodificarapply == 'S') {
      $swmodificar = "N";
    }
    if(trim($msgValidacion) == "") {
      if($swinsertar == 'S') {
        $datos->altaAfiliado($datos);
      } else if($swmodificarapply == 'S') {
        $datos->modAfiliado($datos);
      } else if($sweliminar == 'S') {
        $datos->eliminarAfiliado($id);
      }
    }
  
}

}


?>