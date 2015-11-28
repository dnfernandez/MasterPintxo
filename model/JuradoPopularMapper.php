<?php

require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class JuradoPopularMapper
{

    private $db;
    private $varn;

    /**
     * JuradoPopularMapper constructor.
     */
    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
        $this->varn = 0;
    }

    /**
     * Comprobar si existe el login
     */
    public function existeUsuario($login)
    {
        $stmt = $this->db->prepare("select count(dniJP) from JuradoPopular where dniJP=?");
        $stmt->execute(array($login));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * Obtener datos
     */
    public function consultarUsuario($login)
    {
        $stmt = $this->db->prepare("select * from JuradoPopular where dniJP=?");
        $stmt->execute(array($login));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Comprobar usuario JuradoPopular
     */

    public function comprobarUsuario($login, $contrasenha)
    {
        $stmt = $this->db->prepare("select count(dniJP) from JuradoPopular where dniJP=? and contrasenhaJP=?");
        $stmt->execute(array($login, $contrasenha));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
    }

    /**
     * Insertar
     */

    public function insertar(JuradoPopular $Jp)
    {
        $stmt = $this->db->prepare("insert into JuradoPopular(dniJP, contrasenhaJP, nombreJP, apellidosJP, direccion, cp) values (?,?,?,?,?,?)");
        $stmt->execute(array($Jp->getDniJp(), $Jp->getContrasenhaJp(), $Jp->getNombreJp(), $Jp->getApellidosJp(), $Jp->getDireccionJp(), $Jp->getCp()));
    }

    /**
     * Modificar
     */

    public function modificar(JuradoPopular $Jp)
    {
        $stmt = $this->db->prepare("UPDATE JuradoPopular SET contrasenhaJP=?, nombreJP=?, apellidosJP=?, direccion=?, cp=? WHERE dniJP=?");
        $stmt->execute(array($Jp->getContrasenhaJp(), $Jp->getNombreJp(), $Jp->getApellidosJp(), $Jp->getDireccionJp(), $Jp->getCp(), $Jp->getDniJp()));
    }

    /**
     * Eliminar
     */

    public function eliminar(JuradoPopular $Jpro)
    {
        $stmt = $this->db->prepare("delete from JuradoPopular where dniJP=?");
        $stmt->execute(array($Jpro->getDniJp()));
    }

    /**
     * Método que devuelve si un código es correcto o no.
     */

    public function introducirCodigosJP($codigo, $dniJP)
    {
        $stmt = $this->db->prepare("SELECT idCodigo FROM Codigo WHERE idCodigo=?");
        $stmt->execute(array($codigo));
        $var = 1;

        if ($stmt->fetchColumn() > 0) {
            $stmtt = $this->db->prepare("SELECT usado FROM Codigo WHERE idCodigo=?");
            $stmtt->execute(array($codigo));
            $consulta2 = $stmtt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($consulta2 as $consultita) {
                $var2 = $consultita["usado"];
            }
            if ($var2 == 0) {
                $stmttt = $this->db->prepare("SELECT idPincho as idPincho FROM Codigo C,Establecimiento E,Pincho P WHERE C.idCodigo=? AND C.Establecimiento_nif=E.nif AND E.nif=P.Establecimiento_nif");
                $stmttt->execute(array($codigo));
                $consulta3 = $stmttt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($consulta3 as $consultita) {

                    $ret = $consultita["idPincho"];
                }

                $query = $this->db->prepare("update Codigo set JuradoPopular_dniJP=? where idCodigo=?");
                $query->execute(array($dniJP, $codigo));

                return array($ret, $codigo);

            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }


    /**
     * Método que actualiza el estado de un voto, y en caso de que no exista actualizarlo en la tabla JuradoPopular_Vota_Pincho
     */

    public function seleccionarPinchoJP($idPincho, $dniJP, $codigo)
    {

        $stmt = $this->db->prepare("SELECT numVotos FROM JuradoPopular_Vota_Pincho WHERE Pincho_idPincho=? AND JuradoPopular_dniJP=?");
        $stmt->execute(array($idPincho, $dniJP));
        $lineas = $stmt->rowCount();

        if ($lineas == 0) {
            $stmti = $this->db->prepare("INSERT INTO JuradoPopular_Vota_Pincho (numVotos,Pincho_idPincho,JuradoPopular_dniJP) VALUES (?,?,?)");
            $stmti->execute(array('1', $idPincho, $dniJP));
        } else {
            $consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($consulta as $consultita) {
                $varn = $consultita["numVotos"];
            }
            //	$varn = $lineas["numVotos"];
            $varn = $varn + 1;
            $stmtt = $this->db->prepare("UPDATE JuradoPopular_Vota_Pincho set numVotos=? where Pincho_idPincho=? AND JuradoPopular_dniJP=?");
            $stmtt->execute(array($varn, $idPincho, $dniJP));
        }

        $query2 = $this->db->prepare("update Codigo set usado='1' where idCodigo=?");
        $query2->execute(array($codigo));
    }

    /**
     * Utilizar códigos sin votar
     */

    public function usarCodigo($codigo)
    {
        $stmt = $this->db->prepare("update Codigo set usado='1' where idCodigo=?");
        $stmt->execute(array($codigo));
    }

    /**
     * Comprobar si tiene codigos sin usar
     */

    public function codigosSinUsar($dniJP)
    {
        $stmt = $this->db->prepare("select count(*) from Codigo where JuradoPopular_dniJP=? and usado='0'");
        $stmt->execute(array($dniJP));
        return $stmt->fetchColumn();

    }

    /**
     * Recuperar id's pinchos a partir de los codigos que estan sin usar
     */

    public function recuperarPinchos($dniJP)
    {
        $stmt = $this->db->prepare("select idCodigo, idPincho, nombreP from Pincho p, Codigo c where JuradoPopular_dniJP=? and p.Establecimiento_nif=c.Establecimiento_nif and usado='0'");
        $stmt->execute(array($dniJP));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * Comprobar nif codigos
     */

    public function comprobarNifPinchos($cod1, $cod2, $cod3)
    {

        $stmt = $this->db->prepare("select Establecimiento_nif from Codigo where idCodigo=?");
        $stmt->execute(array($cod1));
        $stmt2 = $this->db->prepare("select Establecimiento_nif from Codigo where idCodigo=?");
        $stmt2->execute(array($cod2));
        $stmt3 = $this->db->prepare("select Establecimiento_nif from Codigo where idCodigo=?");
        $stmt3->execute(array($cod3));
        $nif1 = $stmt->fetch(PDO::FETCH_BOTH);
        $nif2 = $stmt2->fetch(PDO::FETCH_BOTH);
        $nif3 = $stmt3->fetch(PDO::FETCH_BOTH);


        if ($nif1[0] != $nif2[0] && $nif1[0]!=$nif3[0] && $nif2[0]!= $nif3[0]){
            return true;
        }
    }

    /**
     * Listar jurado popular
     */

    public function listarJurados(){
        $stmt = $this->db->query("select * from JuradoPopular");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}