<?php

$conexion = mysqli_connect("localhost","root","","proyecto_final");

$pais = $_POST['paises'];

$query = $conexion->query("SELECT * FROM horario WHERE coddoc = $pais");



while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['idhora']. '">' . $row['nomhora'] . '</option>' . "\n";
}
