<div class="row">
	<div class="col-md-12">
		<?php if(UserData::getById(Session::getUID())->tipo==='0'):?>
		<div class="btn-group pull-right">
			<a href="index.php?view=newmedic" class="btn btn-default"><i class='fa fa-support'></i> Nuevo Medico</a>
		</div>
		<?php endif;?>

		<h1>Psicologos</h1>
		<br>
		<?php

		$users = MedicData::getAll();
		if (count($users) > 0) {
			// si hay usuarios
		?>

			<table class="table table-bordered table-hover">
				<thead>
					<th>Nombre completo</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefono</th>
					<?php if(UserData::getById(Session::getUID())->tipo==='0'):?>
					<th>Acciones</th>
					<?php endif;?>
				</thead>
				<?php
				foreach ($users as $user) {
				?>
					<tr>
						<td><?php echo $user->name . " " . $user->lastname; ?></td>
						<td><?php echo $user->address; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->phone; ?></td>
						<?php if(UserData::getById(Session::getUID())->tipo==='0'):?>
						<td style="width:200px;">
							<a href="index.php?view=medichistory&id=<?php echo $user->id; ?>" class="btn btn-default btn-xs">Historial</a>
							<a href="index.php?view=editmedic&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
							<a href="index.php?view=delmedic&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
						</td>
						<?php endif;?>
					</tr>
			<?php
				}
			} else {
				echo "<p class='alert alert-danger'>No hay medicos</p>";
			}
			?>
	</div>
</div>