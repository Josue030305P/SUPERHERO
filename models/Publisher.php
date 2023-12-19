<?php

require_once 'Conexion.php';


class Publisher extends Conexion{
  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo = parent :: getConexion();
  }

  public function listarPublishers()
  {
      try {
          $consulta = $this->pdo->prepare("CALL spu_publisher_listar()");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }
  
  public function superheroesPorPublisher($publisher_id)
  {
      try {
          $consulta = $this->pdo->prepare("CALL spu_superheroes_por_publisher(?)");
          $consulta->execute([$publisher_id]);
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
          die($e->getMessage());
      }
  }

  
}