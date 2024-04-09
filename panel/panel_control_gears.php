<?php
$titulo="Panel de Control - GEARS";
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
            GEARS
            <a href="panel_control_fotos.php" target="_self">FOTOS</a>
	        <a href="panel_control_audios.php" target="_self">AUDIOS</a>
            <a href="panel_control_videos.php" target="_self">VIDEOS</a>
            <a href="panel_control_links.php" target="_self">LINKS</a>
		</span>

        <?php //Inicio del muestreo
        include("../conexion.php");
        $consulta="select * from gears order by 1";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $cantidad=mysql_num_rows($resultado);
        while($fila=mysql_fetch_array($resultado)){
        ?>
        <table id="tabla_abm_noticia">
            <tr>
                <th width="159">Sponsor Nro.</th>
                <td><?php echo($fila[id]); ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td style="font-weight:bold;"><?php echo($fila[nombre]); ?></td>
            </tr>
            <tr>
                <th>Imagen</th>
                <td><?php if($fila[imagen]) 
                        echo("<img src=\"../".$fila[imagen]."\" />");
                        else
                        echo("Sin imagen para mostrar");
                         ?></td>
            </tr>
            <tr>
                <td><a href="sponsor_form_eliminar.php?id=<?php echo($fila[id]); ?>">ELIMINAR</a></td>
            </tr>
        </table>
        <?php } //LOOP DEL WHILE 
        mysql_close();
        echo("Se han encontrado ".$cantidad." sponsors.");?>
        <br /><a href="sponsor_form_agregar.php">AGREGAR</a>       
	</body>
</html>