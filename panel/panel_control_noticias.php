<?php
$titulo="Panel de Control - NOTICIAS";
include("validacion.php");
$nombre=$_SESSION['nombre'];
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
		<h2>Bienvenido <?php echo($nombre); ?></h2>
		<span id="menu_panel">
            <a href="logout.php" target="_self">LOGOUT</a>
            NOTICIAS
            <a href="panel_control_discografia.php" target="_self">DISCOGRAFIA</a>
            <a href="panel_control_gears.php" target="_self">GEARS</a>
            <a href="panel_control_fotos.php" target="_self">FOTOS</a>
	        <a href="panel_control_audios.php" target="_self">AUDIOS</a>
            <a href="panel_control_videos.php" target="_self">VIDEOS</a>
            <a href="panel_control_links.php" target="_self">LINKS</a>
		</span>       

		<?php //Inicio del muestreo
        include("../conexion.php");
        $consulta="select * from noticias order by 1";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $cantidad=mysql_num_rows($resultado);
        while($fila=mysql_fetch_array($resultado)){
        ?>
        <table id="tabla_abm_noticia">
            <tr>
                <th width="159">Noticia Nro.</th>
                <td><?php echo($fila[id]); ?></td>
			</tr>
            <tr>
                <th>T&iacute;tulo</th>
                <td style="font-weight:bold;"><?php echo($fila[titulo]); ?></td>
			</tr>
            <tr>
                <th>Texto</th>
                <td><?php echo($fila[noticia]); ?></td>
            </tr>
            <tr>
                <th>Fecha ult. mod.</th>
                <td><?php echo($fila[fecha]); ?></td>
            </tr>
            <tr>
				<td><a href="noticias_form_modificar.php?id=<?php echo($fila[id]); ?>">MODIFICAR</a></td>
				<td><a href="noticias_form_eliminar.php?id=<?php echo($fila[id]); ?>">ELIMINAR</a></td>
            </tr>
		</table>
        <?php } //LOOP DEL WHILE 
        mysql_close();
		echo("Se han encontrado ".$cantidad." noticias.");?>
        <br /><a href="noticias_form_agregar.php">AGREGAR NUEVO</a>
	</body>
</html>