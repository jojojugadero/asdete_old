<?php
//Redirigimos las rutas de nuestra aplicación
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
//Ruta relativa usada en páginas
$dirRoot = '/'.$arrayDir[1].'/';
//Ruta completa usada en includes
$incRoot = $_SERVER['DOCUMENT_ROOT'].$dirRoot;

include $incRoot.'POO/CONTROLADOR/ControlCabecera.php';
?>

<table width="100%">
    <tr>
        <td width="20%">
            <a href="<?php echo $dirRoot; ?>POO/VISTA/index.php" title="Volver a inicio"><img src="<?php echo $dirRoot; ?>POO/VISTA/IMAGENES/banner.png" alt="Banner" width="400" height="80"/></a>
        </td>

 
<td class="clase" width="60%" align="center" valign="top"><h1>ASDETE, la unión hace la fuerza...</h1></td>

        <td width="20%">
        <!--En este bloque tendremos los datos de sesión del usuario que se mostrarán en la parte superior derecha de la aplicación-->
            <?php if($ind_sesion == 'S') { ?>
            <table align="right" class="bloque-usuario">
                <tr>
                    <td align="left" valign="top" class="celda-login-usuario"><strong>Nombre usuario:</strong></td>
                    <td align="left" valign="top" class="celda-login-usuario"><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="celda-login-usuario"><strong>Tipo usuario:</strong></td>
                    <td align="left" valign="top" class="celda-login-usuario"><?php echo $tipo_usuario; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="celda-login-usuario"><strong>Desconectar:</strong></td>
                    <td align="left" valign="top" class="celda-login-usuario">
        <!--Según la sesión (afiliado, administrador o superadmin, tendremnos unso estilos determinados-->
                        <?php if($sesion == 'afiliado_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-success btn-sm boton-desconectar">
                            <svg id="i-signout"  viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                            </button>
                        </a>
                        <?php } else if($sesion == 'administrador_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-primary btn-sm boton-desconectar">
                            <svg id="i-signout" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                            </button>
                        </a>
                        <?php } else if($sesion == 'superadmin_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-primary btn-sm boton-desconectar-sadmin">
                            <svg id="i-signout"   viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                            </button>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <?php } ?>
            </div>
        </td>
    </tr>
</table>




