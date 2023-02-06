<?php
$pacients = PacientData::getAll();
$medics = MedicData::getAll();
if((UserData::getById(Session::getUID())->tipo)!='2'){
  print '<script>alert("No esta autorizado para entrar a esta pagina")</script>';
  print "<script>window.location='index.php?view=home';</script>";
}
?>

<div class="row">
  <div class="col-md-10">
    <h1>Nueva Cita</h1>
    <form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Asunto</label>
        <div class="col-lg-10">
          <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Asunto">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Paciente</label>
        <div class="col-lg-10">
          <select name="pacient_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Medico</label>
    <div class="col-lg-10">
<select name="medic_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($medics as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha/Hora</label>
    <div class="col-lg-5">
      <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-5">
      <input type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora">
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
      <button type="submit" class="btn btn-default">Agregar Cita</button>
    </div>
  </div>
</form>

</div>
</div>