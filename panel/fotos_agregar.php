<?php
    $titulo="Actualización de Sponsor";
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
    
    $ok = 1;   // FLAG: 1=OK 0=error
    
    // VALIDO QUE SE HAYA INGRESADO UN ARCHIVO VALIDO O NINGUNO
    $nombre_archivo = $_FILES['userfile']['name'];   // NOMBRE
    $tipo_archivo = $_FILES['userfile']['type'];     // FORMATO
    $tamano_archivo = $_FILES['userfile']['size'];   // TAMAÑO (Bytes)
    $nombre_temp = $_FILES['userfile']['tmp_name'];  // NOMBRE TEMPORAL

    if (!(strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg"))) {// NO ES ARCHIVO GRAFICO
        header("Location:./fotos_form_agregar.php?error=2");
        $ok = 0;}

    if ($tamano_archivo > 4000000) {// TAMAÑO MAXIMO DE 4 MB
        header("Location:./fotos_form_agregar.php?error=3");
        $ok = 0;}
    
    if (!(move_uploaded_file($nombre_temp, "../imagenes/fotos/$nombre_archivo"))){
        echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        $ok = 0;
    }

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

            <?php if($ok) { ?>
            <table id="tabla_abm_noticia">
                <tr>
                    <th>Imagen</th>
                        <td><?php echo("<img src=\"../imagenes/fotos/".$nombre_archivo."\" />");
                         ?></td>
                </tr>
            </table>
                <br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
                font-weight:bold; margin:auto; border:#300; solid:1px;">
                    Inserci&oacute;n exitosa!
                </div><br /><br />
        <?php } //end if ?>
        </body>
</html>