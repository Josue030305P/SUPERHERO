<?php

require_once 'Conexion.php';


class Publisher extends Conexion{
  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo = parent :: getConexion();
  }



  public function listar(){
    try{
      $consulta = $this->pdo->prepare("CALL  spu_publishe_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);

    }
    catch(Exception $e){

      die($e->getMessage());


    }
    
  }

  public function listarPublishes($data =[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_publishes_listar(?)");
      $consulta->execute(
        array($data["id"])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    }
    catch(Exception $e){
      die($e->getMessage());
    }

  }







}

// $publishe = new Publisher();
// $resultado = $publishe->listarpublishes(["id" => "2"]);
// echo json_encode($resultado);


