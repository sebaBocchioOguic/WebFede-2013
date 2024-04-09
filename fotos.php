<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Federico Mele - Fotos</title>
<link href="css/plantilla.css" rel="stylesheet" type="text/css" />

		<script type="text/JavaScript">
			<!--
			function agrandarFoto(theURL,winName,ancho,rel) { //v2.0
				var alto = ancho / rel;
				if(ancho==640){
					window.open(theURL,winName,'resizable=no,width=640,height='+alto);}
				else{
					window.open(theURL,winName,'resizable=no,width=480,height='+alto);}
				}
			//-->
		</script>
</head>
<body>
	<div id="maqueta">
		<div id="header">
		  <img src="imagenes/header.png" alt="Federico Mele -Sitio Web Oficial-" /></div>
	      <div id="separador"><img src="imagenes/separador.jpg" /></div>
          <div style="width:530px; float:right; padding-left:15px; padding-right:15px;"><h2>FOTOS</h2></div>
	      <div id="contenido_fotos">
            <?php 
				/* Obtengo todos las fotos del sitio (imagenes/fotos) */
				$path = "imagenes/fotos";  // SETEO EL DIRECTORIO
				$dir = opendir($path);		 // GUARDO EL RESULTADO EN UNA VARIABLE
				while ($elemento = readdir($dir)){  // POR CADA ELEMENTO, LO MUESTRO
                    if (strlen($elemento) > 2) {  // EVITO QUE SE MUESTRE VACIO EL . Y EL .. DEL DIRECTORIO
					
/*  GetImageSize() :	El índice 0 contiene el ancho de la imagen en píxeles. El índice 1 contiene la altura. El índice 2 es una bandera que indica el tipo de imagen: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(orden de bytes intel), 8 = TIFF(orden de bytes motorola), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. Estos valores corresponden a las constantes IMAGETYPE que fueron agregadas en PHP 4.3.0. El índice 3 es una cadena de texto con el valor correcto height="yyy" width="xxx" que puede ser usado directamente en una etiqueta IMG. */
						/* Obtengo los datos de la imagen */
						$vector_tamano = GetImageSize($path."/".$elemento);
						
						if (!(($vector_tamano[2] >= 1) and ($vector_tamano[2] <=16))) // SI NO ES ARCHIVO DE IMAGEN, SALTEO
							{break;}
						
						$relacion_x_y = $vector_tamano[0] / $vector_tamano[1];
						
						if($vector_tamano[0] > $vector_tamano[1]){ // SI ES APAISADA
							?><div id="foto_small">
		                            <a href="javascript:void(0);" onClick="agrandarFoto('popup.php?img=<?php echo($path."/".$elemento);?>','Foto',640,<?php echo($relacion_x_y); ?>)"><img src="<?php echo($path."/".$elemento);?>" height="150" /></a>
    		                  </div>
                         <?php }
						else { ?>
							<div id="foto_small">
    		                    	<a href="javascript:void(0);" onClick="agrandarFoto('popup.php?img=<?php echo($path."/".$elemento);?>','Foto',480,<?php echo($relacion_x_y); ?>)"><img src="<?php echo($path."/".$elemento);?>" width="150" /></a>
    	                    </div>
						<?php }// end else
						}// end if
					}// end while
			?>
    	  </div>
	      <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="pie"><table width="100%" style="margin:0; padding:0;">
	        <td><span style="text-align:left;"><img src="imagenes/copyright.jpg" /><a href="panel/form_login.php" target="_self"><img src="imagenes/login.jpg" /></a></span></td>
            <td align="right"><span style="text-align:right;"><img src="imagenes/designedby.jpg" /></span></td></table></div>
    </div>
</body>
</html>
