<?php

require_once(__DIR__."/./Concurso.php");
class ConcursoMapper
{

    private $db;

    /**
     * ConcursoMapper constructor.
     */
    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }

    /**
     * Insertar
     */

    public function insertar(Concurso $concurso)
    {
        $stmt = $this->db->prepare("insert into Concurso(nombreC, descripcionC) values (?,?)");
        $stmt->execute(array($concurso->getNombreC(),$concurso->getDescripcionC()));
    }

    /**
     * Modificar
     */

    public function modificar(Concurso $concurso)
    {
        $stmt = $this->db->prepare("update Concurso set descripcionC=? where nombreC=?");
        $stmt->execute(array($concurso->getDescripcionC(),$concurso->getNombreC()));
    }

    /**
     * Eliminar
     */

    public function eliminar(Concurso $concurso)
    {
        $stmt = $this->db->prepare("delete from Concurso where nombreC=?");
        $stmt->execute(array($concurso->getNombreC()));
    }

    /**
     * Ver concurso
     */

    public function verDescripcion($nombreC){
        $stmt = $this->db->prepare("select * from Concurso where nombreC=?");
        $stmt->execute(array($nombreC));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}





















