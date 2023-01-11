<?php
class Modelo{

  private $doctor;
  private $db;

  public function __construct(){
      $this->doctor=array();
      $this->db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT doctor.coddoc, doctor.dnidoc, doctor.nomdoc, doctor.apedoc, specialty.codespe, specialty.nombrees,doctor.sexo, doctor.telefo, doctor.fechanaci, doctor.correo, doctor.naciona, doctor.estado, doctor.fecha_create FROM doctor INNER JOIN specialty ON doctor.codespe = specialty.codespe WHERE doctor.estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->doctor[]=$tabla;
      }
      return $this->doctor;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO doctor (dnidoc, nomdoc,apedoc)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->dnidoc, $data->nomdoc, $data->apedoc));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
	
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>
