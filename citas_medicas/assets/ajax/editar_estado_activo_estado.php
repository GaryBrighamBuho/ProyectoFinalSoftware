<?php
$hostname_conex = "localhost";
$database_conex = "proyecto_final";
$username_conex = "root";
$password_conex = "";
// creación de la conexión a la base de datos con mysql_connect()
$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); ?>
<?php
$id = $_GET['id'];
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
$deleteSQL = sprintf("UPDATE appointment SET estado='0' WHERE codcit=$id");
  $Result1 = mysqli_query( $conex, $deleteSQL) or die(mysqli_error($conex));
if($Result1==true)
{
  echo 1;}
 else 
 {
  echo 0;}
}
?>
""""Se podri hacer un codigo para ambos"""