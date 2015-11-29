<?php


require_once(__DIR__ . "/../nucleo/PDOConnection.php");

class PinchoMapper
{
    private $db;

    /**
     * PinchoMapper constructor.
     */
    public function __construct()
    {
        $this->db = PDOConnection::getInstance();
    }

    /**
     * Metodo que devuelve el idPincho mas alto
     */

    public function ultimoIdPincho(){
        $stmt = $this->db->query("select max(idPincho) as maximo from Pincho");
        return $stmt->fetch(PDO::FETCH_BOTH);
    }

    /**
     * Comprobar si existe un pincho
     */

    public function comprobarPincho($idPincho)
    {
        $stmt = $this->db->prepare("select count(idPincho) from Pincho where idPincho=?");
        $stmt->execute(array($idPincho));

        if($stmt->fetchColumn()>0){
            return true;
        }
    }

    /**
     *
     * Insertar pincho en la base de datos
     */

    public function insertar(Pincho $pincho)
    {
        $stmt = $this->db->prepare("insert into Pincho(idPincho, nombreP, descripcionP, precio, concursante, finalista, Establecimiento_nif, rutaImagen, confirmado) values (?,?,?,?,?,?,?,?,?)");
        $stmt->execute(array($pincho->getIdPincho(), $pincho->getNombreP(), $pincho->getDescripcionP(), $pincho->getPrecio(), $pincho->getConcursante(), $pincho->getFinalista(), $pincho->getEstablecimientoNif(), $pincho->getRutaImagen(), $pincho->getConfirmado()));
    }

    /**
     * Modificar pincho
     */

    public function modificar(Pincho $pincho)
    {
        $stmt = $this->db->prepare("update Pincho set nombreP=?, descripcionP=?, precio=?, concursante=?, finalista=?, rutaImagen=?, confirmado=? where idPincho=?");
        $stmt->execute(array($pincho->getNombreP(), $pincho->getDescripcionP(), $pincho->getPrecio(), $pincho->getConcursante(), $pincho->getFinalista(), $pincho->getRutaImagen(), $pincho->getConfirmado(), $pincho->getIdPincho()));
    }

    /**
     * Eliminar pincho
     */

    public function eliminar(Pincho $pincho)
    {
        $stmt = $this->db->prepare("delete from Pincho where idPincho=?");
        $stmt->execute(array($pincho->getIdPincho()));
    }

    /**
     * Metodo que lista todos los pinchos propuestos
     *
     */

    public function consultarPinchosPropuestos()
    {
        $stmt = $this->db->query("select * from Pincho where concursante='0' and confirmado='0'");
        $pincho = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $pincho;
    }

    /**
     * Metodo que lista pinchos aceptados
     */
    public function consultarPinchosAceptados()
    {
        $stmt = $this->db->query("select * from Pincho where concursante='1'");
        $pincho = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $pincho;
    }

    /**
     * Obtener un pincho por su id y su establecimiento asociado
     */
    public function obtenerPincho($idPincho)
    {
        $stmt = $this->db->prepare("select * from Pincho,Establecimiento where idPincho=? and Establecimiento.nif=Pincho.Establecimiento_nif");
        $stmt->execute(array($idPincho));
        $pincho = $stmt->fetchAll(PDO::FETCH_BOTH);
        if ($pincho != null) {
            return $pincho;
        } else {
            return NULL;
        }
    }

    /**
     * Actualizar propuesta pincho
     */

    public function actualizarPropuestaPincho($idPincho)
    {
        $stmt = $this->db->prepare("update Pincho set concursante='1' where idPincho=? ");
        $stmt->execute(array($idPincho));
    }

    /**
     *	Rechazar una propuesta de pincho
     */

     public function rechazarPincho($idPincho){
     	$stmt = $this->db->prepare("update Pincho set confirmado='1' where idPincho=?");
	$stmt->execute(array($idPincho));
     }

    /**
     *	Ver pincho rechazado
     */
    
     public function verPinchoRechazado($idPincho, $nif){
     	$stmt = $this->db->prepare("select * from Pincho where idPincho=? and Establecimiento_nif=?");
	$stmt->execute(array($idPincho, $nif));
	return $stmt->fetch(PDO::FETCH_BOTH);
	
     }

    /**
     * Actualizar pincho finalista
     */

    public function actualizarPinchoFinalista($idPincho)
    {
        $stmt = $this->db->prepare("update Pincho set finalista=(select valoracion from Pincho_Elegido_JP where Pincho_idPincho=?) where idPincho=?");
        $stmt->execute(array($idPincho, $idPincho));
    }

    /**
     * Listar pinchos finalistas
     */

    public function listarPinchosFinalistas(){
        $stmt = $this->db->query("select * from Pincho where concursante='1' and finalista='1'");
        $pincho = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $pincho;
    }


}
