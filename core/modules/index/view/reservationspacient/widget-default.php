<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">

		</div>
		<a href="./index.php?view=oldreservations" class="btn btn-default pull-right">Citas Anteriores</a>
		<h1>Citas</h1>
		<br>
		<form class="form-horizontal" role="form">
			<input type="hidden" name="view" value="reservationspacient">
			<?php

			$pacients = PacientData::getAll();
			$medics = MedicData::getAll();
			?>

			<div class="form-group">
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="text" name="q" value="<?php if (isset($_GET["q"]) && $_GET["q"] != "") {
																									echo $_GET["q"];
																								} ?>" class="form-control" placeholder="Palabra clave">
					</div>
				</div>


				<?php if (UserData::getById(Session::getUID())->tipo !== "2") : ?>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-male"></i></span>
							<select name="pacient_id" class="form-control">
								<option value="">PACIENTE</option>
								<?php foreach ($pacients as $p) : ?>
									<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] != "") {
																													echo "selected";
																												} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				<?php endif; ?>

				<?php if (UserData::getById(Session::getUID())->tipo !== "1") : ?>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-support"></i></span>
							<select name="medic_id" class="form-control">
								<option value="">MEDICO</option>
								<?php foreach ($medics as $p) : ?>
									<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["medic_id"]) && $_GET["medic_id"] != "") {
																													echo "selected";
																												} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				<?php endif; ?>


				<div class="col-lg-4">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="date" name="date_at" value="<?php if (isset($_GET["date_at"]) && $_GET["date_at"] != "") {
																												echo $_GET["date_at"];
																											} ?>" class="form-control" placeholder="Palabra clave">
					</div>
				</div>

				<div class="col-lg-2">
					<button class="btn btn-primary btn-block">Buscar todos</button>
				</div>
			</div>
		</form>

		<?php
		$reservations = array();
		if ((isset($_GET["q"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"] != "" || $_GET["medic_id"] != "" || $_GET["date_at"] != "")) {
			$sql = "select * from reservation where ";
			if ($_GET["q"] != "") {
				$sql .= " title like '%$_GET[q]%' or note like '%$_GET[q] %' ";
			}

			if ($_GET["q"] != "") {
				$sql .= " and ";
			}

			$sql .= " pacient_id = " . UserData::getPacientById(Session::getUID())->id;

			if ($_GET["medic_id"] != "") {
				$sql .= " and medic_id = " . $_GET["medic_id"];
			}
			if ($_GET["date_at"] != "") {
				$sql .= " and date_at = \"" . $_GET["date_at"] . "\"";
			}
			$reservations = ReservationData::getBySQL($sql);
		} else {
			$reservations = ReservationData::getBySQL("select * from " . ReservationData::$tablename . " where pacient_id=" . UserData::getPacientById(Session::getUID())->id);
		}
		if (count($reservations) > 0) {
			// si hay usuarios
		?>
			<table class="table table-bordered table-hover">
				<thead>
					<th>Asunto</th>
					<th>Medico</th>
					<th>Fecha</th>
					<th>Estado</th>
				</thead>
				<?php
				foreach ($reservations as $reservation) {
					$pacient  = $reservation->getPacient();
					$medic = $reservation->getMedic();
				?>
					<tr>
						<td><?php echo $reservation->title; ?></td>
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
								echo "Completado";
							} else if ($reservation->estado === '3') {
								echo "Cancelado";
							}
							?>
						</td>
					</tr>
			<?php

				}
			} else {
				echo "<p class='alert alert-danger'>No hay citas</p>";
			}


			?>


	</div>
</div>