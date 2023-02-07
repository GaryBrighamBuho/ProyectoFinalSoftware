<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.: Atención Psicológica :.</title>

    <!-- agregar Bootstrap para el CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Agregue CSS personalizado aquí -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Atención Psicológica <sup><small><span class="label label-info">v1.0</span></small></sup> </a>
        </div>

        <!-- Recopila los enlaces de navegación, formularios y otros contenidos para alternar -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php
include 'core/modules/index/model/UserData.php';
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
         <ul class="nav navbar-nav">
          <li><a href="index.php?view=newreservation"><i class="fa fa-asterisk"></i> Nueva Cita</a></li>
          </ul> 
          <ul class="nav navbar-nav side-nav">
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href="index.php?view=reservations"><i class="fa fa-calendar"></i> Citas</a></li>
          <li><a href="index.php?view=pacients"><i class="fa fa-male"></i> Pacientes</a></li>
          <li><a href="index.php?view=medics"><i class="fa fa-support"></i> Medicos</a></li>
          <li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Areas Medicas</a></li>
          <?php if($u->tipo==0):?>
          <li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li>
        <?php endif;?>
          </ul>




<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
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
