<?php
if(count($_POST)>0){
	$paciente = new PacientData();
	$paciente->name = $_POST["name"];
	$paciente->lastname = $_POST["lastname"];
	$paciente->address = $_POST["address"];
	$paciente->phone = $_POST["phone"];
	$paciente->email = $_POST["email"];

	$userPaciente = new UserData();
	$userPaciente->name = $_POST["name"];
	$userPaciente->lastname = $_POST["lastname"];
	$userPaciente->password = sha1(md5(    substr($_POST["lastname"], 0, 4)."1234"   ));
	$userPaciente->username = $_POST["name"] . " " . $_POST["lastname"];
	$userPaciente->email = $_POST["email"];
	$userPaciente->is_active = 1;
	$userPaciente->tipo = 2;

	$tipo = 2;

	$userPaciente->add();
	$paciente->add();
	$msg = "La contraseña es: " . substr($_POST["lastname"], 0, 4)."1234";
	echo '<script>alert("'.$msg.'")</script>';
print "<script>window.location='index.php?view=pacients';</script>";
}