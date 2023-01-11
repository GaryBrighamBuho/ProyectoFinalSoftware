<?php

$conexion = mysqli_connect("localhost","root","","proyecto_final");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM doctor WHERE codespe = $el_continente");

echo '<option value="0">Seleccione un doctor</option>';

while ( $row = $query->fetch_assoc() )
{


	echo '<option value="' . $row['coddoc']. '">' . $row['nomdoc'] . '' . $row['apedoc'] . '</option>' . "\n";
}
