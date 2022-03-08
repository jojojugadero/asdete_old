<?php


echo " <a href="VISTA/index.php">Indice</a>

<!––Formulario con los datos del personal ––>
<form action="CONTROLADOR/redirecciones/logCompruebaPersonal.php" method="POST" id="creacion">

    <div align="center" style="margin-top:100px;">
        <div class="perdiv">
            <table>
                <tr>
                    <td align="center" colspan="2">Personales Login</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top:20px;">Introduce tu nombre y tu password</td>
                </tr>
                <tr>
                    <td align="right" style="padding-right:5px;">Nombre:</td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td align="right" style="padding-right:5px;">Clave:</td>
                    <td><input type="password" name="clave"></td>
                </tr>
            </table>

            <input type="button" onclick="volver();" name="accion" value="Volver">
            <input type="submit" name="accion" value="Enviar">
        </div>
    </div>

</form>
";



?>