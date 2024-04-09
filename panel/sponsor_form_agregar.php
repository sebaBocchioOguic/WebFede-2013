<?php
$titulo="Panel de Control - Modificaci�n de Sponsors";
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
		<script language="javascript" type="text/javascript">
		function validar_campos(){
            if(trim(document.getElementById("nombre").value).length == 0){ // Valido que el titulo no viaje vac�o
                alert('Debe ingresar el nombre del sponsor'); return 0;}
			// Envio el formulario
            document.form_sponsor.submit();
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
		<!-- inicio del contenido -->

		<?php //Inicio del muestreo
        include("../conexion.php");
        $consulta="select MAX(id) from gears"; // Obtiene el m�ximo �ndice de la tabla
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $fila=mysql_fetch_array($resultado);
        $indice=$fila[0]+1;
        switch($error){
            case 1:
                {?>
				<script language="javascript" type="text/javascript"> alert('Debe ingresar el nombre del sponsor'); return 0;</script>
				<?php //echo("Debe ingresar el nombre");
                break;}
            case 2:
                {?>
				<script language="javascript" type="text/javascript"> alert('El formato del archivo no es v�lido. Debe ser GIF o JPG'); return 0;</script>
				<?php //echo("El formato del archivo no es v&aacute;lido. Debe ser GIF o JPG");
                break;}
            case 3:
                {?>
				<script language="javascript" type="text/javascript"> alert('El archivo es demasiado grande. Tama�o M�ximo 500KB'); return 0;</script>
				<?php //echo("El archivo es demasiado grande. Tama&ntilde;o m&aacute;ximo: 500KB");
                break;}
        }
        ?>
        <form name="form_sponsor" action="sponsor_agregar.php" method="post" enctype="multipart/form-data">
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Sponsor Nro.</th>
                    <td><?php echo($indice); ?></td>
                    <input type="hidden" name="id" id="id" value="<?php echo($indice); ?>" />
			    </tr>
                <tr>
                    <th>Nombre</th>
                    <td><input name="nombre" type="text" id="nombre" value="" size="80"  /></td>
			    </tr>
                <tr>
                <tr>
                    <th>Imagen</th>
                    <td><input type="file" name="userfile" id="userfile" />
                    </td>
                </tr>
                <tr>
				    <td colspan="2"><input type="button" value="Agregar" name="agregar" id="agregar" onClick="javascript:validar_campos();" /></td>
                </tr>
		    </table>
            </form>
        <?php
        mysql_close();?>
	</body>
</html>