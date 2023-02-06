<?php

include 'core/modules/index/model/ReservationData.php';
include 'core/modules/index/model/UserData.php';


$r = new ReservationData();
$r->title = $_POST["title"];
$r->medic_id = $_POST["medic_id"];

$r->note = "";
$r->pacient_id = UserData::getPacientById( Session::getUID() )->id;
$r->date_at = "";
$r->time_at = "";
$r->estado = 0;

$r->add();

Core::redir("./index.php?view=reservations");
?>