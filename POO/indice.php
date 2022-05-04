<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body class="js-firstfocus">



	<div class="alignCenter">
		<div id="anchoPaginaSF">
			
			
			<div class="lang_out">
				<div class="sis-frame-bg lang_in">
					Idioma:
					
					
					
					
					
					<a href="#"
						onclick="cambiarIdioma('ESPA', 'ES', 'Castellano');"
						id="lnkIdioma_ESPA" class="js-linkidioma"
						data-langpreffix="ES"
						title="Castellano"><span
						title="Idioma seleccionado: Castellano"><strong>ES</strong></span></a>
					
					
					
					
					|
					
					
					<a href="#"
						onclick="cambiarIdioma('ENGL', 'EN', 'English');"
						id="lnkIdioma_ENGL" class="js-linkidioma"
						data-langpreffix="EN"
						title="English">EN</a>
					
					
				</div>
			</div>

			

			<div class="sfcab">
				<p class="alignlogo"></p>
			</div>


			<div id="sfcol_uno">
				<div class="cajaFormulario">
					<form action="/sisnet/SNetLogin" name="form1" id="form1"
						method="post" class="js-formdata">
						<table width="90%" align="center" cellspacing="0" cellpadding="3">
							<tr>
								<td colspan="2" align="left" height="45"><div class="sis-font-l">
										<strong>Identificación de usuario</strong>
									</div></td>
							</tr>
							<tr>
								<th width="30%" align="right"><label for="usuario">Usuario:</label></th>
								<td align="left"><input name="usuario" id="usuario"
									size="25" maxlength="64"
									data-name="Usuario"
									data-obligatorio="true" data-regexp="_cadena" /></td>
							</tr>
							<tr>
								<th align="right"><label for="clave">Clave:</label></th>
								<td align="left"><input name="password" id="clave"
									type="password" autocomplete="off" size="25" maxlength="25"
									data-name="Clave"
									data-obligatorio="true" data-regexp="_cadena" /></td>
							</tr>
							
							<tr>
								<td></td>
								<td height="22"><div class="sis-bgpositive sis-frame">
										
										  <a href="/sisnet/restaurar_password.jsp">
																				
											¿Ha olvidado su contraseña?
										</a>
									</div></td>
							</tr>
							
							<tr>
								<td height="45" colspan="2" align="center"><input
									name="botonEntrar" id="botonEntrar" type="submit"
									class="mainButton"
									value="Entrar"
									title="Entrar" /></td>
							</tr>
						</table>
						<input name="idPeticion" type="hidden" value="GENEIDEN0001" /> <input
							type="hidden" name="idioma" id="selectorIdioma"
							value="ESPA" />
					</form>
				</div>
			</div>

			<div id="sfcol_dos">
				<div
					style="margin: 230px 30px 0 0px; width: 340px; text-align: center;">
					
				</div>
			</div>

			<div id="sfpie">
	
	<div id="sfpiecolder">
		<a href="http://www.sisnet360.com" target="_blank"
			title="Plataforma SISnet. Sistema Integral de Seguros. Copyright &copy; Netijam Technologies, S.L. Todos los derechos reservados.">
			<img src="/sisnet/media/images/logo_SISnet.png"
			alt="SISnet" />
		</a>
	</div>
	
	<strong>&copy; SISnet Seguros 2022
	</strong> -
	Todos los derechos reservados
</div>
		</div>
	</div>

</body>
</html>























