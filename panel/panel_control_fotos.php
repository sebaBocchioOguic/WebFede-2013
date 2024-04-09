<?php
$titulo="Panel de Control - FOTOS";
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
            <a href="panel_control_gears.php" target="_self">GEARS</a>
            FOTOS
            <a href="panel_control_audios.php" target="_self">AUDIOS</a>
            <a href="panel_control_videos.php" target="_self">VIDEOS</a>
            <a href="panel_control_links.php" target="_self">LINKS</a>
		</span>

            <?php 
				/* Obtengo todos las fotos del sitio (imagenes/fotos) */
				$path = "../imagenes/fotos";  // SETEO EL DIRECTORIO
				$dir = opendir($path);		 // GUARDO EL RESULTADO EN UNA VARIABLE
				while ($elemento = readdir($dir)){  // POR CADA ELEMENTO, LO MUESTRO
                    if (strlen($elemento) > 2) {  // EVITO QUE SE MUESTRE VACIO EL . Y EL .. DEL DIRECTORIO
					
/*  GetImageSize() :	El índice 0 contiene el ancho de la imagen en píxeles. El índice 1 contiene la altura. El índice 2 es una bandera que indica el tipo de imagen: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(orden de bytes intel), 8 = TIFF(orden de bytes motorola), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. Estos valores corresponden a las constantes IMAGETYPE que fueron agregadas en PHP 4.3.0. El índice 3 es una cadena de texto con el valor correcto height="yyy" width="xxx" que puede ser usado directamente en una etiqueta IMG. */
						/* Obtengo los datos de la imagen */
						$vector_tamano = GetImageSize($path."/".$elemento);
						
						if (!(($vector_tamano[2] >= 1) and ($vector_tamano[2] <=16))) // SI NO ES ARCHIVO DE IMAGEN, SALTEO
							{break;}

						?>
                     <table id="tabla_abm_noticia">
                     	<tr><td colspan="2">
                          <div id="foto_small">
		                            <img src="<?php echo($path."/".$elemento);?>" height="150" />
    		              </div></td><td><a href="fotos_form_eliminar.php?archivo=<?php echo($path."/".$elemento); ?>">
                          			ELIMINAR</a></td></tr>
                     </table>
						<?php
						}// end if
					}// end while
			?>
            <br /><a href="fotos_form_agregar.php">AGREGAR</a>
	</body>
</html>