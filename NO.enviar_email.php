<?php function comprobar_email($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminaci�n del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    return ($mail_correcto);
} 
/*
En el primer if compruebo que el email tiene por lo menos 6 caracteres (el m�nimo), que tiene una arroba y s�lo una y que no est� colocada ni al principio ni al final.

En el segundo if comprueba que no tiene algunos caracteres no permitidos. Y los restantes hacen comprobaciones de las distintas partes de la direcci�n de correo, a saber: Que hay un punto en alg�n lado y que la terminaci�n del dominio es correcta y que el principio de la direcci�n tambi�n es correcto.

Finalmente, se devuelve la variable local utilizada para guardar la validez o incorrecci�n del correo. 

FUENTE: Desarrolloweb.com 
*/

?>
