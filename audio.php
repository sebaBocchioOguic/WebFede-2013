<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Federico Mele - Audio</title>
<link href="css/plantilla.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="multimedia/jwplayer/jwplayer.js"></script>
</head>
<body>
	<div id="maqueta">
		<div id="header">
		  <img src="imagenes/header.png" alt="Federico Mele -Sitio Web Oficial-" /></div>
	    	<div id="separador"><img src="imagenes/separador.jpg" /></div>
            <div style="width:530px; float:right; padding-left:15px; padding-right:15px;"><h2>AUDIO</h2></div>
			<div id="contenido_fotos">
            	<span>
                <?php
					include("conexion.php");
					
					$path="multimedia/audio";
					
				  /* Realizo consulta */
				  $consulta="select * from audio order by 1";
				  $resultado=mysql_query($consulta);
				  $cantidad=mysql_num_rows($resultado);
				  
				  if ($cantidad <= 0){		// HAY AUDIOS ?? ?>
                  
							<p style="font-size:22px; color:#FFF; ">No hay audios para reproducir en este momento</p>
				  
                  <?php }
				  else
				  		{ ?>

				<script type="text/javascript">
/*					jwplayer("contenido").setup({ flashplayer: "multimedia/jwplayer/player.swf", file: "multimedia/audio/Shadows Fall - In Effigy.mp3", height: 270, width: 480, image: "multimedia/jwplayer/preview.jpg" });*/
jwplayer("contenido_fotos").setup({ flashplayer: "multimedia/jwplayer/player.swf", playlist: [                        

				<?php
						while($fila=mysql_fetch_array($resultado)){
				?>
				
				{file: "<?php echo($path."/".$fila[nombre_archivo]);?>", title: "<?php echo($fila[nombre]);?>", description: "<?php echo($fila[descripcion]);?>"},
 /* MIENTRAS HAYA AUDIOS */
				/* { duration: 124, file: "multimedia/audio/Shadows Fall - In Effigy.mp3", title: "Demo 2", description: "Descripcion Demo 2"}, { duration: 542, file: "multimedia/audio/Shadows Fall - In Effigy.mp3", title: "Demo 3", description: "Descripcion Demo 3"}, {file: "multimedia/audio/Shadows Fall - In Effigy.mp3", title: "Demo 4", description: "Descripcion Demo 4"}*/

				<?php } // end while ?>
				
				], "controlbar": "over", "controlbar.idlehide": "false", "playlist.position": "bottom", "playlist.size": 180, height: 270, width: 750 });</script>

				<?php 
					} // end IF
				?>
</span></div>
	      <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="pie"><table width="100%" style="margin:0; padding:0;">
	        <td><span style="text-align:left;"><img src="imagenes/copyright.jpg" /><a href="panel/form_login.php" target="_self"><img src="imagenes/login.jpg" /></a></span></td>
            <td align="right"><span style="text-align:right;"><img src="imagenes/designedby.jpg" /></span></td></table></div>
    </div>
</body>
</html>
