<?php
header("Refresh:5;./index.html"); 
$titulo="Consulta";
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$consulta=$_POST['consulta'];

/*  VALIDACIONES YA HECHAS EN JAVASCRIPT EN LA WEB ANTERIOR
$ok=0; //ERROR

if ($nombre == "") header("Location:./contacto.html?error=1");
else
    if ($consulta == "") header("Location:./contacto.html?error=3");
    else
        {
        include("comprobar_email.php");
        if (comprobar_email($email) == 0)
            header("Location:./contacto.html?error=2");
        else
            header("Refresh:3;./index.html");
            $ok=1;  // OK
        }
*/

//if ($ok){
    // CONFIGURAMOS EL EMAIL -- PARA HACER ESTO HACE FALTA CONFIGURAR UN SERVICIO SMTP DEL LADO DEL SERVIDOR
    $destinatario="booocha@gmail.com";
    //$destinatario="booocha@gmail.com,sebakpg83@hotmail.com";
    $asunto="Email desde página PHP";
    $mensaje="Nombre: $nombre
    Apellido: $apellido
    Email: $email
    Telefono: $tel
    Consulta: $consulta";
    mail($destinatario,$asunto,$mensaje);
//}
?>

<html>
    <head>
        <title><?php echo($titulo); ?></title>
        <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
        <!-- esto es una iso donde  estan todos los caracteres que no estan en ingles, espanol, portugues, etc -->
    </head>
    <body>
        <div style="width:400px; padding:12px; text-align:center; background-color:#f00; color:#fff;
        font-weight:bold; margin:auto; border:#300; solid:1px;">Gracias <?php echo($nombre);?> por tu consulta. En breve te respondo.<br /><br />Federico Mele</div>
    </body>

</html>

