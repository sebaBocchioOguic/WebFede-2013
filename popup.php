<?php
$img=$_GET['img'];
?>
<html>
<head>
<title> Imagen Ampliada </title>
<link href="css/plantilla.css" rel="stylesheet" type="text/css" />
<script language="Text/JavaScript">
	window.focus();
</script>
</head>
<body style="padding:0; margin:0; border:0;">
	<img src="<?php echo($img); ?>" width="100%" height="100%" />
</body>
</html>
