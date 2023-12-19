<?php

require_once 'Conexion.php';

class Alignment extends Conexion{
    
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function alignmentPorPublisher($publisher_id)
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_alignment_por_publisher(?)");
            $consulta->execute([$publisher_id]);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}
