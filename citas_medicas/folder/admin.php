<?php
require_once '../controlador/admincontrolador.php';
$objdocto=new doctorcontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    
if($op=="mostrar")
    $objdocto->mostrar();