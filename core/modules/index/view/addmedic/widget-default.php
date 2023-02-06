<?php
if(count($_POST)>0){
	$medico = new MedicData();
	$medico->name = $_POST["name"];
	$medico->lastname = $_POST["lastname"];
	$medico->address = $_POST["address"];
	$medico->email = $_POST["email"];
	$medico->phone = $_POST["phone"];

	$userMedico = new UserData();
	$userMedico->name = $_POST["name"];
	$userMedico->lastname = $_POST["lastname"];
	$userMedico->password = sha1(md5(  substr($_POST["lastname"], 0, 4)."1234"  ));
	$userMedico->username = $_POST["name"] . " " . $_POST["lastname"];
	$userMedico->email = $_POST["email"];
	$userMedico->is_active = 1;
	$userMedico->tipo = 1;

	$tipo = 2;

	$userMedico->add();
	$medico->add();
	$msg = "La contraseña es: " . substr($_POST["lastname"], 0, 4)."1234";
	echo '<script>alert("'.$msg.'")</script>';

print "<script>window.location='index.php?view=medics';</script>";
}
?>