<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Unsaac Clinica</title>

  <!-- Bootstrap core CSS -->
  <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d1d6856f46.js" crossorigin="anonymous"></script>
  <!-- Add custom CSS here -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script src="js/jquery-1.10.2.js"></script>

</head>

<body>

  <div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #9B2A2C">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Unsaac Clinica <sup><small><span class="label label-info">v5.0</span></small></sup> </a>
        <img alt='unsaac' width='35' src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Escudo_UNSAAC.png/454px-Escudo_UNSAAC.png' />
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php
        include 'core/modules/index/model/UserData.php';
        include 'core/modules/index/model/PacientData.php';
        include 'core/modules/index/model/ReservationData.php';
        include 'core/modules/index/model/MedicData.php';

        $u = null;
        if (Session::getUID() != "") :
          $u = UserData::getById(Session::getUID());
        ?>
          <!-- <ul class="nav navbar-nav">
	          <li><a href="index.php?view=newreservation"><i class="fa fa-asterisk"></i> Nueva Cita</a></li>
	          </ul> -->
          <ul class="nav navbar-nav side-nav" style="background-color: #B9851F; color:black">

            <?php if ($u->tipo == 0) : ?>
              <li><a href="index.php?view=home" style="color:white"><i class="fa fa-home"></i> Inicio</a></li>
              <li><a href="index.php?view=reservations" style="color:white"><i class="fa fa-calendar"></i> Citas</a></li>
              <li><a href="index.php?view=pacients" style="color:white"><i class="fa fa-male"></i> Alumnos</a></li>
              <li><a href="index.php?view=medics" style="color:white"><i class="fa fa-support"></i> Psicologos</a></li>
              <li><a href="index.php?view=users" style="color:white"><i class="fa fa-users"></i> Usuarios admin </a></li>
            <?php endif; ?>
            <?php if ($u->tipo == 1) : ?>
              <li><a href="index.php?view=homemedic" style="color:white"><i class="fa fa-home"></i> Inicio</a></li>
              <li><a href="index.php?view=reservationsmedic" style="color:white"><i class="fa fa-calendar"></i> Citas</a></li>
              <li><a href="index.php?view=pacients" style="color:white"><i class="fa fa-male"></i> Alumnos</a></li>
            <?php endif; ?>
            <?php if ($u->tipo == 2) : ?>
              <li><a href="index.php?view=homepacient" style="color:white"><i class="fa fa-home"></i> Inicio</a></li>
              <li><a href="index.php?view=reservationspacient" style="color:white"><i class="fa fa-calendar"></i> Citas</a></li>
              <li><a href="index.php?view=medics" style="color:white"><i class="fa fa-support"></i> Psicologos</a></li>
              <li><a href="index.php?view=newreservation" style="color:white"><i class="fa fa-asterisk"></i> Nueva Cita</a></li>
            <?php endif; ?>
          </ul>
        <?php endif; ?>
        <?php if (Session::getUID() != "") : ?>
          <?php
          $u = null;
          if (Session::getUID() != "") {
            $u = UserData::getById(Session::getUID());
            $user = $u->name . " " . $u->lastname;
          } ?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $user; ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="index.php?view=configuration">Configuracion</a></li>
                <li><a href="logout.php">Salir</a></li>
              </ul>
            <?php else : ?>
            <?php endif; ?>




      </div><!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <?php
      // puedo cargar otras funciones iniciales
      // dentro de la funcion donde cargo la vista actual
      // como por ejemplo cargar el corte actual
      View::load("login");

      ?>
    </div><!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
  <!-- JavaScript -->
  <script src="res/bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>