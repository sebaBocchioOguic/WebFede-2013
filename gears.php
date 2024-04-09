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
				<li><a href="discografia.php">DISCOGRAFIA</a></li>
				<li>GEARS</li>
				<li><a href="multimedia.html">MULTIMEDIA</a></li>
				<li><a href="tour.html">TOUR</a></li>
				<li><a href="educacion.html">EDUCACION</a></li>
				<li><a href="links.php">LINKS</a></li>
				<li><a href="contacto.html">CONTACTO</a></li>
			</ul>
        </div>
      <div id="contenido">
			<h2>GEARS</h2>
        <?php //Inicio del muestreo
        include("conexion.php");
        $consulta="select * from gears order by 1";
        $resultado=mysql_query($consulta);
        // esto guarda la cantidad de resultados obtenidos
        $cantidad=mysql_num_rows($resultado);
        while($fila=mysql_fetch_array($resultado)){
		// echo($fila[nombre]."<br>");
           if($fila[imagen]) 
                echo("<p align=\"center\"><img src=\"".$fila[imagen]."\" alt=\"".$fila[nombre]."\" height=150px width=300px /></p>");
           else
                echo("Sin imagen para mostrar");
        } //LOOP DEL WHILE 
        mysql_close();?>
		</div>
        <div id="separador"><img src="imagenes/separador.jpg" /></div>
		<div id="pie"><table width="100%" style="margin:0; padding:0;">
	        <td><span style="text-align:left;"><img src="imagenes/copyright.jpg" /><a href="panel/form_login.php" target="_self"><img src="imagenes/login.jpg" /></a></span></td>
            <td align="right"><span style="text-align:right;"><img src="imagenes/designedby.jpg" /></span></td></table></div>
    </div>
</body>
</html>
