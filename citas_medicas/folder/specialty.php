<?php
require_once '../controlador/specialtycontrolador.php';
$objspe=new specialtycontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objspe->mostrar();
?>
