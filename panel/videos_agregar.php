<?php
    $titulo="Actualizaci�n de Videos";
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
    $id_form = $_POST['id'];
    $url_form = $_POST['url'];
	$titulo_form = $_POST['titulo'];
    $texto_form = $_POST['descripcion'];
    
    $ok = 1;   // FLAG: 1=OK 0=error

    // VALIDO QUE SE HAYA INGRESADO UN TITULO
    if (!($titulo_form)){
        header("Location:./videos_form_agregar.php?error=1");
        $ok = 0;}

    if (!($url_form)){
        header("Location:./videos_form_agregar.php?error=2");
        $ok = 0;}

	
    $add="insert into videos (`id`,`url`,`titulo`,`descripcion`)
        values ('$id_form', '$url_form', '$titulo_form', '$texto_form');";
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
                <br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
                font-weight:bold; margin:auto; border:#300; solid:1px;">
                    Inserci&oacute;n exitosa!
                </div><br /><br />
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Refrencia Nro.</th>
                    <td><?php echo($id_form); ?></td>
                </tr>
                    <th>URL</th>
                    <td><?php echo($url_form); ?></td>
                <tr>
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><?php echo($titulo_form); ?></td>
                </tr>
                <tr>
                    <th>Descripci&oacute;n</th>
                    <td><?php echo($texto_form); ?></td>
                </tr>
            </table>
        <?php mysql_close(); ?>
        </body>
</html>