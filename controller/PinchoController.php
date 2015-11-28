<?php
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");
require_once(__DIR__ . "/../model/Concurso.php");
require_once(__DIR__ . "/../model/ConcursoMapper.php");
require_once(__DIR__ . "/../model/Establecimiento.php");
require_once(__DIR__ . "/../model/EstablecimientoMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class PinchoController extends BaseController
{
    private $pinchoMapper;
    private $concursoMapper;
    private $establecimientoMapper;

    /**
     * PinchoController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pinchoMapper = new PinchoMapper();
        $this->concursoMapper = new ConcursoMapper();
        $this->establecimientoMapper = new EstablecimientoMapper();
    }

    public function index()
    {
        //Mandamos la descripcion del concurso
        $descripcionC = $this->concursoMapper->verDescripcion("MasterPintxo");
        $this->view->setVariable("descripcionC", $descripcionC);

        //Mandamos los pinchos
        $listaPinchosAcep = $this->pinchoMapper->consultarPinchosAceptados();
        $this->view->setVariable("listaPinchosAcep", $listaPinchosAcep);

        //Creamos la vista
        $this->view->render("pincho", "index");
    }

    /**
     * Accion de listar un pincho para visualizar todos sus datos
     */

    public function consultarPincho()
    {
        $idPincho = $_GET["idPincho"];
        $pincho=$this->pinchoMapper->obtenerPincho($idPincho);
        $this->view->setVariable("datosPincho",$pincho);
        if ($pincho != null) {
            $this->view->render("pincho", "consultarPincho");
        }else{
            $this->index();
        }
    }

    /**
     * Mostrar Gastromapa
     */

    public function gastromapa(){
        $direcciones = $this->establecimientoMapper->listarDirecciones();
        $this->view->setVariable("direcciones",$direcciones);
        $this->view->render("pincho","gastromapa");
    }


}