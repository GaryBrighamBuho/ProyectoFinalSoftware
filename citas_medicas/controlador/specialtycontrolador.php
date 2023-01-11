<?php
require_once '../modelo/modelospecialty.php';
class specialtycontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $specialty=new Modelo();

        $dato=$specialty->mostrar("specialty", "1");
        require_once '../vista/specialty/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/specialty/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nombrees=$_POST['txtnombrees'];
               
     $this->model->insertar($alm);
     //-------------
header("Location: specialty.php");

          }


    }
