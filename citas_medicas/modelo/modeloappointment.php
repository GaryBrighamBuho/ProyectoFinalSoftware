<?php
class Modelo{

  private $appointment;
  private $db;

  public function __construct(){
      $this->appointment=array();
      $this->db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT appointment.codcit, appointment.asunto, appointment.color,customers.codpaci, customers.dnipa, customers.nombrep, customers.apellidop, doctor.coddoc, doctor.dnidoc, doctor.apedoc,doctor.nomdoc, specialty.codespe, specialty.nombrees, appointment.start, appointment.end, appointment.estado, appointment.fecha_create FROM appointment INNER JOIN customers ON appointment.codpaci = customers.codpaci INNER JOIN doctor ON appointment.coddoc = doctor.coddoc INNER JOIN specialty ON appointment.codespe = specialty.codespe WHERE appointment.estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->appointment[]=$tabla;
      }
      return $this->appointment;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO appointment (asunto)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->asunto));

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
