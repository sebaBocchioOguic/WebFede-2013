<?php
$titulo="Panel de Control - Modificación de Sponsors";
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
            if(trim(document.getElementById("nombre").value).length == 0){ // Valido que el nombre no viaje vacío
                alert('Debe ingresar el nombre del link'); return 0;}
            if(trim(document.getElementById("enlace").value).length == 0){ // Valido que el enlace no viaje vacío
                alert('Debe ingresar la dirección del link'); return 0;}
			// Envio el formulario
            document.form_links.submit();
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
        $consulta="select MAX(id) from links"; // Obtiene el máximo índice de la tabla
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $fila=mysql_fetch_array($resultado);
        $indice=$fila[0]+1;
        switch($error){
            case 1:
                {?>
				<script language="javascript" type="text/javascript"> alert('Debe ingresar el nombre del enlace'); return 0;</script>
				<?php //echo("Debe ingresar el nombre");
                break;}
            case 2:
                {?>
				<script language="javascript" type="text/javascript"> alert('Debe ingresar un enlace válido'); return 0;</script>
                <?php //echo("Debe ingresar un enlace v&aacute;lido");
                break;}
        }
        ?>
        <form name="form_links" action="links_agregar.php" method="post">
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Enlace Nro.</th>
                    <td><?php echo($indice); ?></td>
                    <input type="hidden" name="id" id="id" value="<?php echo($indice); ?>" />
			    </tr>
                <tr>
                    <th>Nombre</th>
                    <td><input name="nombre" type="text" id="nombre" value="" size="50"  /></td>
			    </tr>
                <tr>
                <tr>
                    <th>Enlace</th>
                    <td><input type="text" name="enlace" id="enlace" size="50" />
                    </td>
                </tr>
                <tr>
                    <th>Descripci&oacute;n</th>
                    <td><textarea name="descripcion" id="descripcion"></textarea>
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