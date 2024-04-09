<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Federico Mele - Videos</title>
<link href="css/plantilla.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="multimedia/jwplayer/jwplayer.js"></script>
</head>
<body>
	<div id="maqueta">
		<div id="header">
		  <img src="imagenes/header.png" alt="Federico Mele -Sitio Web Oficial-" /></div>
	    	<div id="separador"><img src="imagenes/separador.jpg" /></div>
            <div style="width:530px; float:right; padding-left:15px; padding-right:15px;">
      <h2>VIDEOS</h2></div>
			<div id="contenido_fotos" align="center">
				<?php 
        			include("conexion.php");
					$consulta="select * from videos order by 1";
					$resultado=mysql_query($consulta);
					$cantidad=mysql_num_rows($resultado);

					if ($cantidad <= 0){		// HAY VIDEOS ?? ?>
                  
							<p style="font-size:22px; color:#FFF; ">No hay videos para reproducir en este momento</p>
                  <?php }
				  else
				  		{ 
						while($fila=mysql_fetch_array($resultado)){
							?>
<div style="padding:25px; background-color:#333; border-color:#000; border-width:2px; border-style:solid;"><object width="480" height="390" align="middle"><param name="movie" value="<?php echo($fila[url]);?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo($fila[url]);?>" width="480" height="390" align="middle" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false"></embed></object></div>

					<?php } // end while
						} // end else
							?>
</div>
	      <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="pie"><table width="100%" style="margin:0; padding:0;">
	        <td><span style="text-align:left;"><img src="imagenes/copyright.jpg" /><a href="panel/form_login.php" target="_self"><img src="imagenes/login.jpg" /></a></span></td>
            <td align="right"><span style="text-align:right;"><img src="imagenes/designedby.jpg" /></span></td></table></div>
    </div>
</body>
</html>
