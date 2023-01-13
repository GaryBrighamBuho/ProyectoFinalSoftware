<?php
class Modelo
{
    private $doctor;
    private $db;

    // constructor
    public function __construct()
    {
        // arreglo de doctores
        $this->doctor = array();
        // conexion a la base de datos
        $this->db = new PDO('mysql:host=localhost;dbname=proyecto_final', "root", "");
    }

    // recupera los doctores activos de la base de datos con su especialidad
    public function mostrar($tabla, $condicion)
    {
        // mostramos doctores por su especialidad
        $consulta = "SELECT coddoc, dnidoc, nomdoc, apedoc,sexo, telefo, fechanaci, correo, naciona, estado, fecha_create FROM doctor WHERE estado='1'";

        // realizamos la consulta
        $resultado = $this->db->query($consulta);

        // agregamos los datos de doctores al arreglo
        while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
            $this->doctor[] = $tabla;
        }
        // retornamos
        return $this->doctor;
    }

    // Insertamos nuevos datos de doctor a la base de datos
    public function  insertar(Modelo $data)
    {
        try {
            $query = "INSERT INTO doctor (dnidoc, nomdoc,apedoc)VALUES(?,?,?)";

            $this->db->prepare($query)->execute(array($data->dnidoc, $data->nomdoc, $data->apedoc));
        } catch (Exception $e) {

            die($e->getMessage());
        }
    }

    // funcion para actualizar la base de datos en la tabla, con la nueva data segun la condicion dada
    public function actualizar($tabla, $data, $condicion)
    {
        $consulta = "UPDATE $tabla SET $data WHERE $condicion";
        $resultado = $this->db->query($consulta);
        // retornamos true si salio bien la ejecucion sino retornamos falso
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar($tabla, $condicion)
    {
        $consulta = "DELETE FROM $tabla WHERE $condicion";
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
}
