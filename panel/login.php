<?php
$titulo="LOGIN";
$usu_login=$_POST['usu_login'];
$usu_clave=$_POST['usu_clave'];
		include("../conexion.php");
		$consulta = "select * from usuarios where usu_login='$usu_login' and usu_clave='$usu_clave'";
		$resultado = mysql_query($consulta);
		$cantidad = mysql_num_rows($resultado);
		if($cantidad == 1)
			{
			//rutina de autenticacion
			$fila=mysql_fetch_array($resultado);
			session_start();
			$_SESSION[login]="ok";
			$_SESSION[nombre]=$fila[usu_nombre];
			header("refresh:3;url=panel_control.php");
			}
		else
			{
			header("Location:./form_login.php?error=1");
			}
		mysql_close();
?>
<html>
	<head>
		<title><?php echo($titulo); ?></title>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		<!-- esto es una iso donde  estan todos los caracteres que no estan en ingles, espanol, portugues, etc -->
    <link href="../css/plantilla.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
		font-weight:bold; margin:auto; border:#300; solid:1px;">
			Acceso permitido, redirigiendo al panel principal...
		</div>
	</body>
</html>