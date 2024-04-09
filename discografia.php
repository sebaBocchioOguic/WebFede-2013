<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Federico Mele</title>
<link href="css/plantilla.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="maqueta">
		<div id="header"><img src="imagenes/header.png" alt="Federico Mele -Sitio Web Oficial-" /></div>
        <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="menu">
			<ul>
            	<li><a href="index.html">HOME</a></li>
				<li><a href="noticias.php">NOTICIAS</a></li>
				<li><a href="biografia.html">BIOGRAFIA</a></li>
				<li>DISCOGRAFIA</li>
				<li><a href="gears.php">GEARS</a></li>
				<li><a href="multimedia.html">MULTIMEDIA</a></li>
				<li><a href="tour.html">TOUR</a></li>
				<li><a href="educacion.html">EDUCACION</a></li>
				<li><a href="links.php">LINKS</a></li>
				<li><a href="contacto.html">CONTACTO</a></li>
			</ul>
        </div>
      <div id="contenido">
			<h2>DISCOGRAFIA</h2>
                <?php    include("conexion.php");
                          
                          /* Realizo consulta */
                          $consulta="select * from discografia order by 1";
                          $resultado=mysql_query($consulta);
                          $cantidad=mysql_num_rows($resultado);
                          
                          while($fila=mysql_fetch_array($resultado)){
                ?>
			<?php if($fila[imagen]){ ?>
                <img src="<?php echo($fila[imagen]); ?>" alt="<?php echo($fila[titulo]); ?>" width="500px" height="500px" /><?php  } //end if ?>
            <h3><?php echo($fila[titulo]); ?></h3><?php echo($fila[texto]); ?><hr>
           <?php } 
                mysql_close();?>
      </div>
        <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="pie"><table width="100%" style="margin:0; padding:0;">
	        <td><span style="text-align:left;"><img src="imagenes/copyright.jpg" /><a href="panel/form_login.php" target="_self"><img src="imagenes/login.jpg" /></a></span></td>
            <td align="right"><span style="text-align:right;"><img src="imagenes/designedby.jpg" /></span></td></table></div>
    </div>
</body>
</html>
