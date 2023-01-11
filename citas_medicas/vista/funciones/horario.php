<?php

$conexion = mysqli_connect("localhost","root","","proyecto_final");

$query = $conexion->query("SELECT * FROM horario");

echo '<option value="0">Seleccione un horario</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['idhora']. '">' . $row['nomhora'] . '</option>' . "\n";
}
