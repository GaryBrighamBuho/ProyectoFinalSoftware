<?php

$reservation = ReservationData::getById($_GET["cita_id"]);
$medic = MedicData::getById($reservation->medic_id);
$pacient = PacientData::getById($reservation->pacient_id);

if ((UserData::getById(Session::getUID())->tipo) != '1') {
  print '<script>alert("No esta autorizado para entrar a esta pagina")</script>';
  print "<script>window.location='index.php?view=home';</script>";
}
?>

<div class="row">
  <div class="col-md-10">
    <h1>Confirmar cita</h1>
    <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
      <label for="inputEmail1" class="col-lg-2 control-label">Id Cita</label>
      <div class="form-group">
        <div class="col-lg-10">
          <!-- <input type="text" name="reservation_id" required class="form-control" placeholder=<?php echo '"' . $reservation->id . '"' ?>  readonly> -->
          <input type="hidden" name="reservation_id" readonly required value="<?php echo $reservation->id; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
        <div class="col-lg-10">
          <input type="text"  name="title" required class="form-control" placeholder=<?php echo '"'.$reservation->title.'"' ?>  disabled>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
        <div class="col-lg-10">
          <input type="text" name="pacient_id" required class="form-control" placeholder=<?php echo '"'.$pacient->name.' '.$pacient->lastname.'"' ?>  disabled>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Psicologo</label>
        <div class="col-lg-10">
          <input type="text" name="medic_id" required class="form-control" placeholder=<?php echo '"'.$medic->name.' '.$medic->lastname.'"' ?>  disabled>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
        <div class="col-lg-5">
          <input type="date" name="date_at" required class="form-control" placeholder="Fecha">
        </div>
        <div class="col-lg-5">
          <input type="time" name="time_at" required class="form-control" placeholder="Hora">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Nota</label>
        <div class="col-lg-10">
          <textarea class="form-control" name="note" placeholder="Nota"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Confirmar cita</button>
        </div>
      </div>
    </form>

  </div>
</div>