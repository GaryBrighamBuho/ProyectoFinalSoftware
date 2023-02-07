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
		<a href="./index.php?view=oldreservations" class="btn btn-default pull-right">Citas Anteriores</a>
		<h1>Citas</h1>
		<br>
		<form class="form-horizontal" role="form">
			<input type="hidden" name="view" value="reservations">
			<?php
			//recuperar datos del paciente y del medico
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

				//recuperar datos de los alumnos de los psicologos
				<?php if(UserData::getById(Session::getUID())->tipo!=="2"): ?>																											
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-male"></i></span>
						<select name="pacient_id" class="form-control">
							<option value="">ALUMNOS</option>
							<?php foreach ($pacients as $p) : ?>
								<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["pacient_id"]) && $_GET["pacient_id"] != "") {
																												echo "selected";
																											} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<?php endif; ?>
		//recuperar datos de los psicologos de los alumnos
        <?php if(UserData::getById(Session::getUID())->tipo!=="1"): ?>																											
				<div class="col-lg-2">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-support"></i></span>
						<select name="medic_id" class="form-control">
							<option value="">PSICOLOGOS</option>
							<?php foreach ($medics as $p) : ?>
								<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["medic_id"]) && $_GET["medic_id"] != "") {
																												echo "selected";
																											} ?>><?php echo $p->id . " - " . $p->name . " " . $p->lastname; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<?php endif; ?>

			    //recupera las fechas en las que hay reserva
				<div class="col-lg-4">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="date" name="date_at" value="<?php if (isset($_GET["date_at"]) && $_GET["date_at"] != "") {
																												echo $_GET["date_at"];
																											} ?>" class="form-control" placeholder="Palabra clave">
					</div>
				</div>
                //boton de busqueda
				<div class="col-lg-2">
					<button class="btn btn-primary btn-block">Buscar</button>
				</div>

			</div>
		</form>

		<?php
		//recuperar datos de la busqueda
		$reservations = array();
		if ((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "" || $_GET["date_at"] != "")) {
			$sql = "select * from reservation where ";
			if ($_GET["q"] != "") {
				$sql .= " title like '%$_GET[q]%' or note like '%$_GET[q] %' ";
			}

			if ($_GET["pacient_id"] != "") {
				if ($_GET["q"] != "") {
					$sql .= " and ";
				}
				$sql .= " pacient_id = " . $_GET["pacient_id"];
			}

			if ($_GET["medic_id"] != "") {
				if ($_GET["q"] != "" || $_GET["pacient_id"] != "") {
					$sql .= " and ";
				}

				$sql .= " medic_id = " . $_GET["medic_id"];
			}



			if ($_GET["date_at"] != "") {
				if ($_GET["q"] != "" || $_GET["pacient_id"] != "" || $_GET["medic_id"] != "") {
					$sql .= " and ";
				}

				$sql .= " date_at = \"" . $_GET["date_at"] . "\"";
			}

			$reservations = ReservationData::getBySQL($sql);
		} else {
			$reservations = ReservationData::getBySQL( "select * from ".ReservationData::$tablename );
		}
		if (count($reservations) > 0) {
			// si hay citas
		?>
			// tabla de datos de las citas
			<table class="table table-bordered table-hover">
				<thead>
					//columnas de la tabla
					<th>Asunto</th>
					<th>Paciente</th>
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
						//recuperar datos de citas para su respectiva columna
						<td><?php echo $reservation->title; ?></td>
						<td><?php echo $pacient->name . " " . $pacient->lastname; ?></td>
						<td><?php echo $medic->name . " " . $medic->lastname; ?></td>

						<?php if($reservation->estado!=='0'):?>
							<td><?php echo $reservation->date_at . " " . $reservation->time_at; ?></td>
						<?php endif; ?>
						<?php if($reservation->estado==='0'):?>
							<td><?php echo "Fecha no definida" ?></td>
						<?php endif; ?>

						<td style="width:130px;">
						
							<?php
							//mostrar estado de la cita 
							if($reservation->estado === '0'){
								echo "Publicado";
							}else if($reservation->estado === '1'){
								echo "Confirmado";
							}else if($reservation->estado === '2'){
								echo "Completado";
							}else if($reservation->estado === '3'){
								echo "Cancelado";
							}
							?>
						</td>
						<!-- <td style="width:130px;">
							<a href="index.php?view=editreservation&id=<?php echo $reservation->id; ?>" class="btn btn-warning btn-xs">Editar</a>
							<a href="index.php?action=delreservation&id=<?php echo $reservation->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
						</td> -->
					</tr>
			<?php

				}
			} else {
				//alerta de que no hay pacientes
				echo "<p class='alert alert-danger'>No hay pacientes</p>";
			}
			?>
	</div>
</div>