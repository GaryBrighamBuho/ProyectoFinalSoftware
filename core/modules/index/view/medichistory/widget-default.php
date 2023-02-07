<?php
$medic = MedicData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
</div>
		<h1>Historial de Citas del Medico</h1>
<h4>Medico: <?php echo $medic->name." ".$medic->lastname;?></h4>

<br>
		<?php
		$sql = "select * from ".ReservationData::$tablename." where medic_id=$medic->id and estado = '2' order by date_at";
		$reservations = ReservationData::getBySQL($sql);
		if(count($reservations)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Asunto</th>
			<th>Paciente</th>
			<th>Medico</th>
			<th>Fecha</th>
			</thead>
			<?php
			foreach($reservations as $reservation){
				$pacient  = $reservation->getPacient();
				$medic = $reservation->getMedic();
				?>
				<tr>
				<td><?php echo $reservation->title; ?></td>
				<td><?php echo $pacient->name." ".$pacient->lastname; ?></td>
				<td><?php echo $medic->name." ".$pacient->lastname; ?></td>
				<td><?php echo $reservation->date_at." ".$reservation->time_at; ?></td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay citas</p>";
		}


		?>


	</div>
</div>