<?php
$titulo="Panel de Control - Eliminaci&oacute;n de Enlace";
include("validacion.php");
$nombre=$_SESSION['nombre'];
$id_param = $_GET['id'];
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

		<?php //Inicio del muestreo
        include("../conexion.php");
        $consulta="select * from links where id = $id_param";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $fila=mysql_fetch_array($resultado);
        ?>ESTA POR ELIMINAR AL SIGUIENTE ENLACE
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Enlace Nro.</th>
                    <td><?php echo($fila[id]); ?></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo($fila[nombre]); ?></td>
                </tr>
                <tr>
                    <th>Enlace</th>
                    <td><?php echo($fila['link']); ?></td>
                </tr>
                <tr>
                    <th>Descripci&oacute;n</th>
                    <td><?php echo($fila[descripcion]); ?></td>
                </tr>
                <tr>
                    <td><a href="links_eliminar.php?id=<?php echo($id_param); ?>">CONFIRMA LA ELIMINACION</a></td>
                </tr>
		    </table>                            
        <?php
        mysql_close();?>
	</body>
</html>