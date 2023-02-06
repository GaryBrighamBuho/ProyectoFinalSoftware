<?php
ini_set("localhost",25);
$para      = '182902@gmail.com';
$para2      = '182926@gmail.com';
$titulo    = 'El título';
$mensaje   = 'Hola';
$cabeceras = 'From: webmaster@example.com' . "\r\n" .
'Reply-To: webmaster@example.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
mail($para2, $titulo, $mensaje, $cabeceras);
echo '<script>alert("Contrasenia enviada con exito")</script>';
?>