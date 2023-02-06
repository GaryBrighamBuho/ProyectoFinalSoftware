<?php

$client = UserData::getById($_GET["id"]);

if ($client->tipo == 1){
  $clientMedic = MedicData::getById($_GET["id"]);
  $clientMedic->del();
}
if ($client->tipo == 2){
  $clientPacient = PacientData::getById($_GET["id"]);
  $clientPacient->del();
}

$client->del();
Core::redir("./index.php?view=users");

?>