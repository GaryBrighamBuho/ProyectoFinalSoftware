<h1>Dashboard</h1>

<div class="row">
	<div class="col-md-12">
		<h2>Tus solicitudes</h2>
		<p>Aqui podras ver las publicaciones de los alumnos que han solicitado tu
			atencion en particular.
		</p>
	
	<?php
	$sql = "select * from " . ReservationData::$tablename . " where medic_id = " . UserData::getMedicById(Session::getUID())->id;
	$reservations = ReservationData::getBySQL($sql);
	if (count($reservations) > 0) {
	?>
		<table class="table table-bordered table-hover">
			<thead>
				<th>Asunto</th>
				<th>Alumno</th>
				<th>Medico</th>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Acciones</th>
			</thead>
			<?php
			foreach ($reservations as $reservation) {
				if($reservation->estado!=='0') continue;
				$pacient  = $reservation->getPacient();
				$medic = $reservation->getMedic();
			?>
				<tr>
					<td><?php echo $reservation->title; ?></td>
					<td><?php echo $pacient->name . " " . $pacient->lastname; ?></td>
					<td><?php echo $medic->name . " " . $medic->lastname; ?></td>
					<?php if ($reservation->estado !== '0') : ?>
						<td><?php echo $reservation->date_at . " " . $reservation->time_at; ?></td>
					<?php endif; ?>
					<?php if ($reservation->estado === '0') : ?>
						<td><?php echo "Fecha no definida" ?></td>
					<?php endif; ?>
					<td style="width:130px;">

						<?php
						if ($reservation->estado === '0') {
							echo "Publicado";
						} else if ($reservation->estado === '1') {
							echo "Confirmado";
						} else if ($reservation->estado === '2') {
							echo "Completado <button>Eva</button>";
						} else if ($reservation->estado === '3') {
							echo "Cancelado";
						}
						?>
					</td>
					<td>
						<a <?php echo "href='index.php?view=acceptreservation&cita_id=".$reservation->id."'" ?> >
							<button class="btn-primary" >Aceptar</button>
						</a>
					</td>
				</tr>
		<?php
			}
		} else {
			echo "<p class='alert alert-danger'>No hay solicitudes personales</p>";

		}
		?>
		</div>
</div>

</div>