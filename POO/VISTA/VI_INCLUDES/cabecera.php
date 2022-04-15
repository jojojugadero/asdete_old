<?php
$pagina = $_SERVER['PHP_SELF'];
$arrayDir = preg_split('/\//',$pagina);
$dirRoot = '/'.$arrayDir[1].'/';

include $incRoot.'POO/CONTROLADOR/ControlCabecera.php';
?>

<table width="100%">
    <tr>
        <td width="20%"></td>

 
<td width="60%" align="center" valign="top"><h1>ASDETE, la unión hace la fuerza...</h1></td>









       
        <td width="20%">
            <?php if($ind_sesion == 'S') { ?>
            <table align="right" class="user-login-block">
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Nombre usuario:</strong></td>
                    <td align="left" valign="top" class="user-login-cell"><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Tipo usuario:</strong></td>
                    <td align="left" valign="top" class="user-login-cell"><?php echo $tipo_usuario; ?></td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="user-login-cell"><strong>Desconectar:</strong></td>
                    <td align="left" valign="top" class="user-login-cell">
                        
                        <?php if($sesion == 'afiliado_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-success btn-sm btn-logout">
                            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                            </button>
                        </a>
                        <?php } else if($sesion == 'administrador_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-primary btn-sm btn-logout">
                            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
                            </svg>
                            </button>
                        </a>
                        <?php } else if($sesion == 'superadmin_session'){ ?>
                        <a title='Haz click para deslogearte' href ='<?php echo $url_desconectar; ?>'>
                            <button class="btn btn-primary btn-sm btn-logout-sadmin">
                            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
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




