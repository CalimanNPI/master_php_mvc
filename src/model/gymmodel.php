<?php

namespace Cdc\Gym\model;

use PDO;
use PDOException;
use Cdc\Gym\lib\Model;

// Clase se extiende de la clase model
class GymModel extends Model
{
  // Constructor de la clase
  function __construct()
  {
    // Hace referencia al nombre de la clase base Model pra hacer uso de sus métodos
    parent::__construct();
  }

  function getEjercicios()
  {

    $sql = "SELECT * FROM dbo.ejercicio";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  function getEjercicioById($param)
  {
    $sql = "SELECT * FROM dbo.ejercicio WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute($param);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  public function  saveEjercicio($params)
  {
    $sql = "INSERT INTO dbo.ejercicio (musculo, ejercicio, descipcion, img, multimedia) VALUES (?,?,?,?,?)";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function  updateEjercicio($params)
  {
    $sql = "UPDATE dbo.ejercicio SET musculo=?, ejercicio=?, descipcion=?, img=?, multimedia=? WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function  deleteEjercicio($param)
  {
    $sql = "DELETE FROM dbo.ejercicio WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($param);
  }

  /*** Rutinas */
  function getRutinas()
  {
    $sql = "SELECT * FROM dbo.rutina";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  function getRutinaById($param)
  {
    $sql = "SELECT * FROM dbo.rutina WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute($param);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  public function saveRutina($params)
  {
    $sql = "INSERT INTO dbo.rutina (id_ejercicio, series, repeticiones, descanso, dia, prof_clave, fecha_crea, nom_rutina, id_rutina, peso) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function  updateRutina($params)
  {
    $sql = "UPDATE dbo.rutina SET id_ejercicio=?, series=?, repeticiones=?, descanso=?, dia=?, prof_clave=?, fecha_crea=GETDATE(), nom_rutina=?, peso=? WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function  deleteRutina($param)
  {
    $sql = "DELETE FROM dbo.rutina WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($param);
  }

  /*** asignacion */
  function getAsignaciones()
  {
    $sql = "SELECT * FROM dbo.asignacion";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  function getAsignacionById($param)
  {
    $sql = "SELECT * FROM dbo.asignacion WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    $stm->execute($param);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  public function saveAsignacion($params)
  {
    $sql = "INSERT INTO dbo.asignacion (id_rutina, duracion, fecha_asig, clave_prof, clave_usu, fechaInicio, fechaFin) VALUES (?,?,GETDATE(),?,?,?,?)";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function updateAsignacion($params)
  {
    $sql = "UPDATE dbo.asignacion SET id_rutina=?, duracion=?, fecha_asig=GETDATE(), clave_prof=?, clave_usu=?, fechaInicio=?, fechaFin=? WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($params);
  }

  public function deleteAsignacion($param)
  {
    $sql = "DELETE FROM dbo.asignacion WHERE id=?";
    $stm = $this->db->connect_web()->prepare($sql);
    return $stm->execute($param);
  }
}
