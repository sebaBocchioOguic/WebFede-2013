<?php
$titulo="Formulario de ingreso";
?>
<html>
	<head>
		<title><?php echo($titulo); ?></title>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		<!-- esto es una iso donde  estan todos los caracteres que no estan en ingles, espanol, portugues, etc -->
    <link href="../css/plantilla.css" rel="stylesheet" type="text/css">
    <link href="../css/alert.css" rel="stylesheet" type="text/css">
	<script language="JavaScript" type="text/javascript" src="../js/string.js"></script>
    <script language="javascript" type="text/javascript" src="../js/alert.js"></script>
    <script language="javascript" type="text/javascript">
		function validar_campos(){
            if(trim(document.getElementById("usu_login").value).length == 0){ // Valido que el usuario no viaje vacío
                alert('Debe ingresar su nombre de usuario'); return 0;}
			if(trim(document.getElementById("usu_clave").value).length == 0){ // Valido que la clave no viaje vacía
                alert('Debe ingresar su password'); return 0;}

			// Envio el formulario
            document.form_login.submit();
		}
    </script>
	</head>
	<body>
	  <div style="background-image:url(../imagenes/fondo_login.jpg); width:400px; height:240px; margin:auto; ">
		<div style="height:70px;"></div>
		<div><table align="center" id="tabla_login">
		    <form name="form_login" id="form_login" action="login.php" method="post">
		      <tr>
		        <td align="right">Usuario</td>
		        <td><input type="text" id="usu_login" name="usu_login" /></td>
		        </tr>
		      <tr><td align="right">Clave</td>
		        <td><input type="password" id="usu_clave" name="usu_clave" /></td>
		        </tr>
		      <tr><td colspan=2><input type="button" value="Login" name="env_login" id="env_login" onClick="javascript:validar_campos();" /></td></tr>
	        </form>
	      </table></div>
	    </div>
  </div>

		<?php
			$error = $_GET['error'];
			if ($error == 1){
			//echo("Usuario y/o clave incorrecto/s");			?>
		<div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
		font-weight:bold; margin:auto; border:#300; solid:1px;">
			Usuario y/o clave incorrectos.
		</div>
		<?php
			}
            else if ($error == 2){ ?>
		        <div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
		        font-weight:bold; margin:auto; border:#300; solid:1px;">
		            La sesión expiró. Vuelva a loguearse.
		        </div>
        <?php
            }
		?>

	</body>
</html>