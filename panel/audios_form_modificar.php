<?php
$titulo="Panel de Control - Modificaci&oacute;n de Audios";
include("validacion.php");
$nombre=$_SESSION['nombre'];
$error=$_GET['error'];
$id_param = $_GET['id'];
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
		<script language="javascript" type="text/javascript">
		function validar_campos(){
            if(trim(document.getElementById("nombre").value).length == 0){ // Valido que el titulo no viaje vacío
                alert('Debe ingresar el título del tema'); return 0;}
			// Envio el formulario
            document.form_audio.submit();
		}
    </script>
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
        $consulta="select * from audio where id = $id_param";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $fila=mysql_fetch_array($resultado);
        switch($error){
            case 1:
                {echo("Debe ingresar el T&Iacute;tulo a mostrar");
                break;}
        }
        ?>
        <form name="form_audio" action="audios_modificar.php" method="post" enctype="multipart/form-data">
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Referencia Nro.</th>
                    <td><?php echo($fila[id]); ?></td>
                    <input type="hidden" name="id" id="id" value="<?php echo($fila[id]); ?>" />
			    </tr>
                <tr>
                    <th>Nombre Archivo</th>
                    <td><?php echo($fila[nombre_archivo]); ?></td>
                    <input type="hidden" name="nombre_archivo" id="nombre_archivo" value="<?php echo($fila[nombre_archivo]); ?>" />
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><input name="nombre" type="text" id="nombre" value="<?php echo($fila[nombre]); ?>" size="80"  /></td>
			    </tr>
                <tr>
                    <th>Descripci&oacute;n</th>
                    <td><textarea name="descripcion" cols="60" rows="20" id="descripcion"><?php echo($fila[descripcion]); ?></textarea></td>
                </tr>
                <tr>
				    <td colspan="2"><input type="button" value="Modificar" name="modificar" id="modificar" onClick="javascript:validar_campos();" /></td>
                </tr>
		    </table>
            </form>
        <?php
        mysql_close();?>
	</body>
</html>