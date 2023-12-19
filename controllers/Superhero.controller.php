<?php

require_once '../models/Superhero.php';


if (isset($_GET['operacion'])) {
    $superhero = new Superhero();

    if ($_GET['operacion'] == 'contarSuperheroesPorAlineacion') {
        $resultado = $superhero->contarSuperheroesPorAlineacion();
        echo json_encode($resultado);
    } else {
        
    }
}
