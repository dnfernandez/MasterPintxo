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
        $stmt = $this->db->prepare("insert into pincho(idPincho, nombreP, descripcionP, precio, concursante, finalista, Establecimiento_nif, rutaImagen) values (?,?,?,?,?,?,?,?)");
        $stmt->execute(array($pincho->getIdPincho(), $pincho->getNombreP(), $pincho->getDescripcionP(), $pincho->getPrecio(), $pincho->getConcursante(), $pincho->getFinalista(), $pincho->getEstablecimientoNif(), $pincho->getRutaImagen()));
    }

    /**
     * Modificar pincho
     */

    public function modificar(Pincho $pincho)
    {
        $stmt = $this->db->prepare("update pincho set nombreP=?, descripcionP=?, precio=?, concursante=?, finalista=? , rutaImagen=? where idPincho=?");
        $stmt->execute(array($pincho->getNombreP(), $pincho->getDescripcionP(), $pincho->getPrecio(), $pincho->getConcursante(), $pincho->getFinalista(), $pincho->getIdPincho(), $pincho->getRutaImagen()));
    }

    /**
     * Eliminar pincho
     */

    public function eliminar(Pincho $pincho)
    {
        $stmt = $this->db->prepare("delete from pincho where idPincho=?");
        $stmt->execute(array($pincho->getIdPincho()));
    }

    /**
     * Metodo que lista todos los pinchos propuestos
     *
     */

    public function consultarPinchosPropuestos()
    {
        $stmt = $this->db->query("select * from Pincho where concursante='0'");
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
        $stmt = $this->db->prepare("update pincho set concursante='1' where idPincho=? ");
        $stmt->execute(array($idPincho));
    }

    /**
     * Actualizar pincho finalista
     */

    public function actualizarPinchoFinalista($idPincho)
    {
        $stmt = $this->db->prepare("update pincho set finalista=(select valoracion from Pincho_Elegido_JP where Pincho_idPincho=?) where idPincho=?");
        $stmt->execute(array($idPincho, $idPincho));
    }


}