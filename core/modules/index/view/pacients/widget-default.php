<div class="row">
	<div class="col-md-12">
		<?php if (UserData::getById(Session::getUID())->tipo === '0') : ?>
			<div class="btn-group pull-right">
				<a href="index.php?view=newmedic" class="btn btn-default"><i class='fa fa-support'></i> Nuevo Medico</a>
			</div>
		<?php endif; ?>


		<h1>Pacientes</h1>
		<br>

		<?php
		$u = null;
		$u = UserData::getById(Session::getUID());
		if (Session::getUID() != "") {

			if ($u->tipo === '2') {
				print '<script>alert("No esta autorizado para entrar a esta pagina")</script>';
				print "<script>window.location='index.php?view=home';</script>";
			}
		} ?>

		<?php
		$users = PacientData::getAll();
		if (count($users) > 0) {
			// si hay usuarios
		?>

			<table class="table table-bordered table-hover">
				<thead>
					<th>Nombre completo</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>
				<?php
				foreach ($users as $user) {
				?>
					<tr>
						<td><?php echo $user->name . " " . $user->lastname; ?></td>
						<td><?php echo $user->address; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<td style="width:<?php echo ($u->tipo) == 0 ? '200px;' : '100px;' ?> ">
							<a href="index.php?view=pacienthistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Historial</a>
							<?php if ($u->tipo == 0) : ?>
								<a href="index.php?view=editpacient&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
								<a href="index.php?view=delpacient&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
							<?php endif; ?>
						</td>
					</tr>
			<?php
				}
			} else {
				echo "<p class='alert alert-danger'>No hay pacientes</p>";
			}
			?>
	</div>
</div>