<?php
    $titulo="Eliminación de Videos";
    $id_form = $_GET['id'];
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
?>
<html>
    <head>
        <title><?php echo($titulo); ?></title>
        <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
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
            <?php include("../conexion.php");
            $elim="delete from videos where id='$id_form'";
            mysql_query($elim);?>
		<br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
		font-weight:bold; margin:auto; border:#300; solid:1px;">
			Eliminaci&oacute;n exitosa!
		</div><br /><br />
        <?php mysql_close(); ?>
        </body>
</html>