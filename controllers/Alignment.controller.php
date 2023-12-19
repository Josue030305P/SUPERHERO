<?php

require_once '../models/Publisher.php';
require_once '../models/Alignment.php';

if (isset($_GET['operacion'])) {
    $publisher = new Publisher();
    $alignment = new Alignment();

    if ($_GET['operacion'] == 'listarPublishers') {
        $resultado= $publisher->listarPublishers();
        echo json_encode($resultado);
    } elseif ($_GET['operacion'] == 'alignmentPorPublisher') {
        $idPublisher = isset($_GET['id']) ? $_GET['id'] : null;

        if ($idPublisher) {
            $resultado = $alignment->alignmentPorPublisher($idPublisher);
            echo json_encode($resultado);
        } else {
            echo json_encode('error');
        }
    }
}

?>
