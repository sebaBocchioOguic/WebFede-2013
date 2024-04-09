<?php
$titulo="Panel de Control - Modificaci&oacute;n de discograf&iacute;a";
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
            if(trim(document.getElementById("titulo").value).length == 0){ // Valido que el titulo no viaje vac�o
                alert('Debe ingresar el t�tulo'); return 0;}
			// Envio el formulario
            document.form_discografia.submit();
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
        $consulta="select * from discografia where id = $id_param";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $fila=mysql_fetch_array($resultado);
        switch($error){
            case 1:
                {echo("Debe ingresar el t&iacute;tulo");
                break;}
            case 2:
                { ?>
					<script language="javascript" type="text/javascript"> alert('El formato del archivo no es v�lido. Debe ser GIF o JPG'); return 0;</script>
					<?php //echo("El formato del archivo no es v&aacute;lido. Debe ser GIF o JPG");
                break;}
            case 3:
				{ ?>
					<script language="javascript" type="text/javascript"> alert('El archivo es demasiado grande. Tama�o M�ximo 100KB'); return 0;</script>
                    <?php //echo("El archivo es demasiado grande. Tama&ntilde;o m&aacute;ximo: 100KB");
                break;}
        }
        ?>
        <form name="form_discografia" action="discografia_modificar.php" method="post" enctype="multipart/form-data">
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Referencia Nro.</th>
                    <td><?php echo($fila[id]); ?></td>
                    <input type="hidden" name="id" id="id" value="<?php echo($fila[id]); ?>" />
			    </tr>
                <tr>
                    <th>Imagen</th>
                    <td><?php if($fila[imagen]) 
                            echo("<img src=\"../".$fila[imagen]."\" />");
                            else
                            echo("Sin imagen para mostrar");
                             ?> <br>Si desea agregar/cambiar la imagen, seleccionela aqu� abajo
                             <input type="file" name="userfile" id="userfile" /><hr>
                             </td>
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><input name="titulo" type="text" id="titulo" value="<?php echo($fila[titulo]); ?>" size="80"  /></td>
			    </tr>
                <tr>
                    <th>Texto</th>
                    <td><textarea name="texto" cols="60" rows="20" id="texto"><?php echo($fila[texto]); ?></textarea></td>
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