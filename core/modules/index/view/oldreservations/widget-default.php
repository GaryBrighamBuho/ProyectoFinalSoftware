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
		<h1>Citas</h1>
		<br>
		<?php

		$reservations = ReservationData::getOld();
		if (count($reservations) > 0) {
			// si hay usuarios
		?>
			<table class="table table-bordered table-hover">
				<thead>
					<th>Asunto</th>
					<th>Paciente</th>
					<th>Medico</th>
					<th>Fecha</th>
					<!-- <th>Acciones</th> -->
				</thead>
				<?php
				foreach ($reservations as $reservation) {
					$pacient  = $reservation->getPacient();
					$medic = $reservation->getMedic();
					if($reservation->date_at==="") continue;
				?>
					<tr>
						<td><?php echo $reservation->title; ?></td>
						<td><?php echo $pacient->name . " " . $pacient->lastname; ?></td>
						<td><?php echo $medic->name . " " . $pacient->lastname; ?></td>
						<td><?php echo $reservation->date_at . " " . $reservation->time_at; ?></td>

						<!-- <td style="width:130px;">
							<a href="index.php?view=editreservation&id=<?php echo $reservation->id; ?>" class="btn btn-warning btn-xs">Editar</a>
							<a href="index.php?action=delreservation&id=<?php echo $reservation->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
						</td> -->
					</tr>
			<?php
				}
			} else {
				echo "<p class='alert alert-danger'>No hay reservaciones antiguas</p>";
			}
			?>
	</div>
</div>