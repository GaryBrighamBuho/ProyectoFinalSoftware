<?php

include 'core/modules/index/model/ReservationData.php';

$r = ReservationData::getById($_POST["reservation_id"]);

if($r->estado==="0"){
  $r->note = $_POST["note"];
  $r->date_at = $_POST["date_at"];
  $r->time_at = $_POST["time_at"];
  $r->estado = 1;

  $r->update();
}


print "<script>window.location='index.php?view=pacients';</script>";



Core::redir("./index.php?view=reservations");
?>