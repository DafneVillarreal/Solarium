<?php
$to="dafne.villarreal4369@alumnos.udg.mx";
$subject="prueba de correo";
$message="este es un correo con xampp";
$headers='From: solar.energy.solarium@gmail.com'."\r\n". 
'Reply-To: solar.energy.solarium@gmail.com';

if(mail($to,$subject,$message,$headers)){
    echo "el correo enviado a $to fue exitoso";
}else{
    echo "el correo no se pudo enviar";
}
?>



