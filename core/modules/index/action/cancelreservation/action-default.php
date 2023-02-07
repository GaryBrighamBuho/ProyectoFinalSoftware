<?php

echo $_POST["reservation_id"];
echo "Gasdfa";

include 'core/modules/index/model/ReservationData.php';
$r = ReservationData::getById($_POST["reservation_id"]);

if($r->estado==="1"){
  $r->estado = 3;
  $r->update();
}else{
  print '<script>alert("No se pudo cancelar la cita")</script>';
}

print "<script>window.location='index.php?view=reservationmedics';</script>";



Core::redir("./index.php?view=reservationsmedics");
?>