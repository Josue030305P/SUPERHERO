<?php

require_once '../models/Publisher.php';

if(isset($_GET['operacion'])){
  $publishe = new Publisher();

  if($_GET['operacion']== 'listar'){
    $resultado = $publishe->listar();
    echo json_encode($resultado);

  }elseif($_GET['operacion'] == 'listarPublishes'){
    $resultado = $publishe->listarPublishes(["id"=> $_GET['id']]);
    json_encode($resultado);
  }



}
