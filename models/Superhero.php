<?php
require_once 'Conexion.php';

class Superhero extends Conexion
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    public function contarSuperheroesPorAlineacion()
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_contar_superheroes_por_alineacion()");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
