<?php
$titulo="Panel de Control - LINKS";
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
            <a href="panel_control_noticias.php" target="_self">NOTICIAS</a>
            <a href="panel_control_discografia.php" target="_self">DISCOGRAFIA</a>
            <a href="panel_control_gears.php" target="_self">GEARS</a>
            <a href="panel_control_fotos.php" target="_self">FOTOS</a>
	        <a href="panel_control_audios.php" target="_self">AUDIOS</a>
            <a href="panel_control_videos.php" target="_self">VIDEOS</a>
            LINKS
		</span>
       
        <?php //Inicio del muestreo
        include("../conexion.php");
        $consulta="select * from links order by 1";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $cantidad=mysql_num_rows($resultado);
        while($fila=mysql_fetch_array($resultado)){
        ?>
        <table id="tabla_abm_noticia">
            <tr>
                <th width="159">Enlace Nro.</th>
                <td><?php echo($fila[id]); ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td style="font-weight:bold;"><?php echo($fila[nombre]); ?></td>
            </tr>
            <tr>
                <th>Enlace</th>
                <td><?php echo($fila['link']); ?></td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><?php echo($fila[descripcion]); ?></td>
            </tr>
            <tr>
                <td><a href="links_form_eliminar.php?id=<?php echo($fila[id]); ?>">ELIMINAR</a></td>
            </tr>
        </table>
        <?php } //LOOP DEL WHILE 
        mysql_close();
        echo("Se han encontrado ".$cantidad." enlaces.");?>
        <br /><a href="links_form_agregar.php">AGREGAR NUEVO</a>       
	</body>
</html>