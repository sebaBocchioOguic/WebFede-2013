<?php
$titulo="Panel de Control - Modificación de Im&aacute;genes";
include("validacion.php");
$nombre=$_SESSION['nombre'];     
$error=$_GET['error'];
?>
<html>
	<head>
		<title><?php echo($titulo); ?></title>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
		<!-- esto es una iso donde  estan todos los caracteres que no estan en ingles, espanol, portugues, etc -->
        <link href="../css/plantilla.css" rel="stylesheet" type="text/css" />
		<link href="../css/alert.css" rel="stylesheet" type="text/css">
		<script language="JavaScript" type="text/javascript" src="../js/string.js"></script>
		<script language="javascript" type="text/javascript" src="../js/alert.js"></script>
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

		<?php //Inicio del muestreo
        switch($error){
		//	case 1:
			case 2:
                {?>
   				<script language="javascript" type="text/javascript"> alert('El formato del archivo no es válido. Debe ser GIF o JPG'); return 0;</script>
				<?php //echo("El formato del archivo no es v&aacute;lido. Debe ser GIF o JPG");
                break;}
            case 3:
                {?>
   				<script language="javascript" type="text/javascript"> alert('El archivo es demasiado grande. Tamaño Máximo 4MB'); return 0;</script>
				<?php //echo("El archivo es demasiado grande. Tama&ntilde;o m&aacute;ximo: 4 MB (4096 KB)");
                break;}
        }
        ?>
        <form action="fotos_agregar.php" method="post" enctype="multipart/form-data">
            <table id="tabla_abm_noticia">
                <tr>
                    <td><input type="file" name="userfile" id="userfile" /></td>
				    <td><input type="submit" name="agregar" id="agregar" value="Agregar" /></td>
                </tr>
		    </table>
            </form>
	</body>
</html>