<?php
require_once '../modelo/modelodoctor.php';

// Controlador para psicologos
class doctorcontrolador
{

    public $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    function mostrar()
    {
        $doctor = new Modelo();

        $dato = $doctor->mostrar("doctor", "1");
        require_once '../vista/Psicologos/mostrar.php';
    }

    //INSERTAR
    public  function nuevo()
    {
        require_once '../vista/Psicologos/new.php';
    }
    //aca ando haciendo
    public function recibir()
    {
        $alm = new Modelo();
        $alm->dnidoc = $_POST['txtdnidoc'];
        $alm->nomdoc = $_POST['txtnomdoc'];


        $this->model->insertar($alm);
        //-------------
        header("Location: doctor.php");
    }
}
