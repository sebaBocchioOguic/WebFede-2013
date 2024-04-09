<?php
    $titulo="Actualización de noticia";
    $id_form = $_POST['id'];
    $titulo_form = $_POST['titulo'];
    $noticia_form = $_POST['noticia'];
    $fecha_form = date("Y-m-d");
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
    
    $ok = 1;   // FLAG: 1=OK 0=error

    // VALIDACIONES
    if ($titulo_form == "")
        {header("Location:./noticias_form_agregar.php?error=1");
        $ok=0;}
    if ($noticia_form == "")  
        {header("Location:./noticias_form_agregar.php?error=2");
        $ok=0;}
    
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
            
            if ($ok){ // SI PASO LAS VALIDACIONES
                $add="insert into noticias (`id` ,`titulo` ,`noticia` ,`fecha`)
                    values ('$id_form', '$titulo_form', '$noticia_form', '$fecha_form');";
                    mysql_query($add);
            }       ?>
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Noticia Nro.</th>
                    <td><?php echo($id_form); ?></td>
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><?php echo($titulo_form); ?></td>
                </tr>
                <tr>
                    <th>Texto</th>
                    <td><?php echo($noticia_form); ?></td>
                </tr>
                <tr>
                    <th>Fecha ult. mod.</th>
                    <td><?php echo($fecha_form); ?></td>
                </tr>
            </table>
                <br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
                font-weight:bold; margin:auto; border:#300; solid:1px;">
                    Inserci&oacute;n exitosa!
                </div><br /><br />
        <?php mysql_close(); ?>
        </body>
</html>