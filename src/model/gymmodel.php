<?php

namespace Web\Gym\model;

use PDO;
use Web\Gym\lib\Model;

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
    $stm = $this->db->connect_cdc()->prepare($sql);
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    return $stm->fetchAll();
  }

  public function  saveEjercicio($params)
  {
    $sql = "INSERT INTO dbo.ejercicio (musculo, ejercicio, descipcion, img, multimedia) VALUES (?,?,?,?,?)";
    $stm = $this->db->connect_cdc()->prepare($sql);
    return $stm->execute($params);
  }

  public function  updateEjercicio($params)
  {
    $sql = "UPDATE dbo.ejercicio SET musculo=?, ejercicio=?, descipcion=?, img=?, multimedia=? WHERE id=?";
    $stm = $this->db->connect_cdc()->prepare($sql);
    return $stm->execute($params);
  }

  public function  deleteEjercicio($param)
  {
    $sql = "DELETE FROM dbo.ejercicio WHERE id=?";
    $stm = $this->db->connect_cdc()->prepare($sql);
    return $stm->execute($param);
  }

}
