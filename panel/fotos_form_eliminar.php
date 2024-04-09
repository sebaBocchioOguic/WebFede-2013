<?php
$titulo="Panel de Control - Eliminaci&oacute;n de Imagen";
include("validacion.php");
$nombre=$_SESSION['nombre'];
$archivo = $_GET['archivo'];
?>
<html>
	<head>
		<title><?php echo($titulo); ?></title>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		<!-- esto es una iso donde  estan todos los caracteres que no estan en ingles, espanol, portugues, etc -->
        <link href="../css/plantilla.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h2><?php echo($titulo); ?></h2>
		<h2><?php echo($nombre); ?></h2>
        <a href="logout.php" target="_self">LOGOUT</a>
        <a href="panel_control_noticias.php" target="_self">NOTICIAS</a>
        <a href="panel_control_discografia.php" target="_self">DISCOGRAFIA</a>
        <a href="panel_control_gears.php" target="_self">GEARS</a>
        <a href="panel_control_fotos.php" target="_self">FOTOS</a>
        <a href="panel_control_audios.php" target="_self">AUDIOS</a>
        <a href="panel_control_videos.php" target="_self">VIDEOS</a>
        <a href="panel_control_links.php" target="_self">LINKS</a>
            <table id="tabla_abm_noticia">
                <tr><td>
                    <img src="<?php echo($archivo);?>" height="150" /></td>
                    <td><a href="fotos_eliminar.php?archivo=<?php echo($archivo); ?>">CONFIRMA LA ELIMINACION</a></td>
                </tr>
		    </table>                            
	</body>
</html>