<?php
    $titulo="Actualización de Discograf&iacute;a";
    include("validacion.php");
	$nombre=$_SESSION['nombre'];
    $id_form = $_POST['id'];
    $titulo_form = $_POST['titulo'];
    $texto_form = $_POST['texto'];
    
    $ok = 1;   // FLAG: 1=OK 0=error

    // VALIDO QUE SE HAYA INGRESADO UN TITULO
    if (!($titulo_form)){
        header("Location:./discografia_form_modificar.php?error=1&id=$id_form");
        $ok = 0;}
    
    // VALIDO QUE SE HAYA INGRESADO UN ARCHIVO VALIDO O NINGUNO
    if ($_FILES['userfile']['name']){   /* Si se AGREGO algún archivo */
        $nombre_archivo = $_FILES['userfile']['name'];   // NOMBRE
        $tipo_archivo = $_FILES['userfile']['type'];     // FORMATO
        $tamano_archivo = $_FILES['userfile']['size'];   // TAMAÑO (Bytes)
        $nombre_temp = $_FILES['userfile']['tmp_name'];  // NOMBRE TEMPORAL

        if (!(strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg"))) {// NO ES ARCHIVO GRAFICO
            header("Location:./discografia_form_modificar.php?error=2&id=$id_form");
            $ok = 0;}

        if ($tamano_archivo > 100000) {// TAMAÑO MAXIMO DE 100KB
            header("Location:./discografia_form_modificar.php?error=3&id=$id_form");
            $ok = 0;}
        
        if (!(move_uploaded_file($nombre_temp, "../imagenes/$nombre_archivo"))){
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }

        $add="update discografia set titulo = '$titulo_form', texto = '$texto_form', imagen = 'imagenes/$nombre_archivo' where id = '$id_form'";
    }
    else{                               /* Sin archivo */
        $add="update discografia set titulo = '$titulo_form', texto = '$texto_form' where id = '$id_form'";
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

            <?php include("../conexion.php");
            if($ok) mysql_query($add); // SI LAS VALIDACIONES FUERON OK  ?>
            <table id="tabla_abm_noticia">
                <tr>
                    <th width="159">Refrencia Nro.</th>
                    <td><?php echo($id_form); ?></td>
                </tr>
                <tr>
                    <th>T&iacute;tulo</th>
                    <td><?php echo($titulo_form); ?></td>
                </tr>
                <tr>
                    <th>Texto</th>
                    <td><?php echo($texto_form); ?></td>
                </tr>
                <tr>
                    <th>Imagen</th>
                        <td><?php if($nombre_archivo) 
                        echo("<img src=\"../imagenes/".$nombre_archivo."\" />");
                        else
                        echo("Sin imagen para actualizar");
                         ?></td>
                </tr>
            </table>
                <br /><br /><div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
                font-weight:bold; margin:auto; border:#300; solid:1px;">
                    Actualizaci&oacute;n exitosa!
	               </div><br /><br />
        <?php mysql_close(); ?>
        </body>
</html>