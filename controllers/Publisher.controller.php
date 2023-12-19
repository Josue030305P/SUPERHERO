<?php

require_once '../models/Publisher.php';

if (isset($_GET['operacion'])) {
    $publisher = new Publisher();

    if ($_GET['operacion'] == 'listarPublishers') {
        $resultados = $publisher->listarPublishers();
        echo json_encode($resultados);
    } elseif ($_GET['operacion'] == 'superheroesPorPublisher') {
        $idPublisher = isset($_GET['id']) ? $_GET['id'] : null;

        if ($idPublisher) {
            $resultados = $publisher->superheroesPorPublisher($idPublisher);
            echo json_encode($resultados);
        } else {
            echo json_encode('error');
        }
    } 
    
}





