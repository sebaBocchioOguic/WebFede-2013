<?php
    $titulo="Actualización de Audios";
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
	$id_form = $_POST['id'];
    $titulo_form = $_POST['titulo'];
    $texto_form = $_POST['descripcion'];
    
    $ok = 1;   // FLAG: 1=OK 0=error

    // VALIDO QUE SE HAYA INGRESADO UN TITULO
    if (!($titulo_form)){
        header("Location:./audios_form_agregar.php?error=1");
        $ok = 0;}
	
	// VALIDO QUE HAYA AGREGADO ALGUN ARCHIVO
	if ($_FILES['userfile']['name']){
        $nombre_archivo = $_FILES['userfile']['name'];   // NOMBRE
        $tipo_archivo = $_FILES['userfile']['type'];     // FORMATO
        $tamano_archivo = $_FILES['userfile']['size'];   // TAMAÑO (Bytes)
        $nombre_temp = $_FILES['userfile']['tmp_name'];  // NOMBRE TEMPORAL

        if (!(strpos($tipo_archivo, "audio") || strpos($tipo_archivo, "mpeg") || strpos($tipo_archivo, "mp3"))) {
			// NO ES ARCHIVO DE MUSICA
            header("Location:./audios_form_agregar.php?error=3");
            $ok = 0;}

/*		POR AHORA NO LE VALIDO EL TAMAÑO DEL ARCHIVO
        if ($tamano_archivo > 100000) {  // >100KB
            header("Location:./audios_form_agregar.php?error=4");
            $ok = 0;}
        echo("<BR>TAMAÑO: $tamano_archivo <BR>");*/

        if (!(move_uploaded_file($nombre_temp, "../multimedia/audio/$nombre_archivo"))){
            header("Location:./audios_form_agregar.php?error=4");
            $ok = 0;}
		
        $add="insert into audio (`id`,`nombre_archivo`,`nombre`,`descripcion`)
        values ('$id_form', '$nombre_archivo', '$titulo_form', '$texto_form');";
		}
	else{
		header("Location:./audios_form_agregar.php?error=2");
        $ok = 0;}
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
            if($ok) mysql_query($add); // SI LAS VALIDACIONES FUERON OK  ?>
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Refrencia Nro.</th>
                    <td><?php echo($id_form); ?></td>
                </tr>
                    <th>Nombre Archivo</th>
                    <td><?php echo($nombre_archivo); ?></td>
                <tr>
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><?php echo($titulo_form); ?></td>
                </tr>
                <tr>
                    <th>Descripcion</th>
                    <td><?php echo($texto_form); ?></td>
                </tr>
            </table>
                <br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
                font-weight:bold; margin:auto; border:#300; solid:1px;">
                    Inserci&oacute;n exitosa!
                </div><br /><br />
        <?php mysql_close(); ?>
        </body>
</html>