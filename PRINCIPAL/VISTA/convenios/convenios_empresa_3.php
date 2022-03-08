
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>App Personal</title>
    <link rel="stylesheet" href="VISTA/css/estilos.css">
</head>
<?php

include 'datos.php';

session_start();

if(isset($_SESSION['afiliado_sesion']) == 'afiliado_sesion') {
    $url1 ="appAfiliados.php";
    //header('Location: '.$url1);
  } else {
    $url2 ="index.php";
    header('Location: '.$url2);
  }
  $id_afil =  $_SESSION['id_afiliado'];
  $afiliado = getAfiliado($id_afil);
  $id_empresa_conv = $_SESSION['id_empresa'];
  $empresa_conv = getEmpresa($id_empresa_conv);

  $empresas = getEmpresas();
?>

<body class="cuerpo_contenedor" >


    <header class="cabecera">
      <?php include "cabecera.php" ?>
    </header>

    <!––En la parte izquierda seleccionamos las empresas de una lista en HTML ––>
   <nav class="navega"><p style="font-size:large;">Empresas del sector</p>

      <ul >
         <li class="li_sidebar"><a href="empresa1.php" class="enlace_sidebar">Empresa 1</a></li>
         <li class="li_sidebar"><a href="empresa2.php" class="enlace_sidebar">Empresa 2</a></li>
         <li class="li_sidebar"><a href="empresa3.php" class="enlace_sidebar">Empresa 3</a></li>
         <li class="li_sidebar"><a href="empresa4.php" class="enlace_sidebar">Empresa 4</a></li>
         <li class="li_sidebar"><a href="empresa5.php" class="enlace_sidebar">Empresa 5</a></li>
         <li class="li_sidebar"><a href="empresa6.php" class="enlace_sidebar">Empresa 6</a></li>
         <li class="li_sidebar"><a href="empresa7.php" class="enlace_sidebar">Empresa 7</a></li>
         <li class="li_sidebar"><a href="empresa8.php" class="enlace_sidebar">Empresa 8</a></li>
         <li class="li_sidebar"><a href="empresa9.php" class="enlace_sidebar">Empresa 9</a></li>
         <li class="li_sidebar"><a href="empresa10.php" class="enlace_sidebar">Empresa 10</a></li>
         <li class="li_sidebar"><a href="empresa11.php" class="enlace_sidebar">Empresa 11</a></li>
         <li class="li_sidebar"><a href="empresa12.php" class="enlace_sidebar">Empresa 12</a></li>
      </ul>
   </nav>
   <aside class="barra"><p style="font-size:large;">Contactos</p>
   <!––En la parte derecha ponemos los contactos de la web con una lista en HTML ––>
   <ul >
      <li class="li_nav1">Teléfono</li>
      <li class="li_nav2">912345678</li>
      <li class="li_nav1">Email</li>
      <li class="li_nav2">admin@asdete.com</li>
      <li class="li_nav1">Dirección</li>
      <li class="li_nav2">C\ Asdete 123</li>
   </ul>
   </aside>


    <article class="skynet">

    <a href="index.php">Indice</a> > <a href="afiliadosLogin.php">Login</a> > <a href="appAfiliados.php">Afiliados</a>

    <h2>CONVENIO 3</h2>
                <section>
                    <h3>Artículo 1. Partes que conciertan el convenio colectivo</h3>
                    <p>El presente Convenio Colectivo ha sido negociado por la Comisión Negociadora del
Convenio Colectivo, integrada por la Asociación de Empresas de Limpieza Pública
(ASELIP), como parte empresarial, y por la parte social, integrada por la Federación
Regional de Servicios Públicos en representación de la Unión General de Trabajadores
(U.G.T.), por la Federación de Construcción y Servicios de CCOO de Madrid y el Sindicato
de Limpiezas, Mantenimiento Urbano y Medio Ambiente de la CAM de la Confederación
General de Trabajo (CGT).</p>
                    <p>El presente Convenio Colectivo ha sido firmado y ratificado por la Asociación de Empresas
de Limpieza Pública (ASELIP) y por la Federación Regional de empleados y empleadas de
los Servicios Públicos en representación de la Unión General de Trabajadores (U.G.T.) y
por la Federación de Construcción y Servicios de CCOO de Madrid y la Confederación
Territorial de Madrid, Castilla La Mancha, y Extremadura de la Confederación General del
Trabajo (CGT).</p>
                </section>
                <section>
                    <h3>Artículo 2. Ámbito personal y territorial</h3>
                    <section>
                        <h3>Art2</h3>
                        <p>El presente Convenio Colectivo tendrá ámbito local limitado al término municipal de Madrid
y será de aplicación a todas las Empresas dedicadas a la actividad de Limpieza Pública
Viaria en el ámbito territorial antes delimitado, regulando las relaciones laborales entre tales
Empresas y los/as trabajadores/as que prestan sus servicios en la L.P.V. de Madrid-Capital,
cualquiera que sea su modalidad de contrato y siendo de obligado cumplimiento por unas
y otros/as.</p>
                    </section>
                    <section>
                        <h3>Artículo 3. Vigencia, duración y prorroga</h3>
                        <p>Las condiciones establecidas en este Convenio forman un todo orgánico indivisible y a
efecto de su aplicación práctica serán consideradas globalmente en cómputo anual, sin que
quepa la aplicación de una normativa aislada sobre condiciones anteriores.
                        </p>
                    </section>
                    <section>
                        <h3>Artículo 7. Derechos adquiridos</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est repellat harum voluptatibus error accusamus quisquam, ipsa ullam nostrum exercitationem dolorem necessitatibus asperiores distinctio sint tenetur! Exercitationem atque earum obcaecati veritatis. eran superestrellas de la editorial.
                        </p>
                    </section>
                    <section>
                        <h3>1990</h3>
                        <p>El gobierno de los Estados Unidos revocó la carta del Estado de Nueva York de los Vengadores en un tratado con la Unión Soviética. Los Vengadores luego recibieron un estatuto de las Naciones Unidas y los Vengadores se dividieron en dos equipos con un equipo suplente de reserva que respaldaba a los equipos principales.</p>
                    </section>
                    <section>
                        <h3>2000</h3>
                        <p>Se respetarán todos los derechos adquiridos que, pactados individual o colectivamente,
superen o no se recojan en el presente Convenio.</p>
                    </section>
                    <section>
                        <h3>Artículo 8. Comisión mixta paritaria</h3>
                        <p>El mismo día de la firma del presente Convenio Colectivo se constituirá una Comisión Mixta
Paritaria.</p>
                    </section>
                    <section>
                        <h4>Artículo 9. Solución extrajudicial de conflictos</h4>
                        <p>La solución de los conflictos que afecten a los trabajadores y empresarios incluidos en el
ámbito de aplicación de este Convenio Colectivo, se efectuará conforme a los
procedimientos regulados en el Acuerdo Interprofesional sobre la creación del sistema de
Solución Extrajudicial de Conflictos y del Instituto Laboral de Madrid en su reglamento..</p>
                        <p>
                        Todas las discrepancias que se produzcan en la aplicación o interpretación del presente
Convenio Colectivo que no hayan podido ser resueltas en el seno de la Comisión Mixta
Paritaria deberán solventarse, con carácter previo a una demanda judicial, de acuerdo con
los procedimientos regulados en el Acuerdo Interprofesional sobre la creación de un
sistema de solución extrajudicial de conflictos de trabajo, a través del Instituto Laboral de la
Comunidad de Madrid.</p>
                        <p>Todas las discrepancias que se produzcan en la aplicación o interpretación del presente
Convenio Colectivo que no hayan podido ser resueltas en el seno de la Comisión Mixta
Paritaria deberán solventarse, con carácter previo a una demanda judicial, de acuerdo con
los procedimientos regulados en el Acuerdo Interprofesional sobre la creación de un
sistema de solución extrajudicial de conflictos de trabajo, a través del Instituto Laboral de la
Comunidad de Madrid.</p>
                    </section>
                </section>
    
    </article>
    <footer class="pie"><?php include "pie.php" ?></footer>
    

</body>
</html>


