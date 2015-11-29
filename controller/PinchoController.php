<?php
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");
require_once(__DIR__ . "/../model/Concurso.php");
require_once(__DIR__ . "/../model/ConcursoMapper.php");
require_once(__DIR__ . "/../model/Establecimiento.php");
require_once(__DIR__ . "/../model/EstablecimientoMapper.php");
require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class PinchoController extends BaseController
{
    private $pinchoMapper;
    private $concursoMapper;
    private $establecimientoMapper;
    private $juradoPopularMapper;

    /**
     * PinchoController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pinchoMapper = new PinchoMapper();
        $this->concursoMapper = new ConcursoMapper();
        $this->establecimientoMapper = new EstablecimientoMapper();
        $this->juradoPopularMapper = new JuradoPopularMapper();
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
        $pincho = $this->pinchoMapper->obtenerPincho($idPincho);
        $this->view->setVariable("datosPincho", $pincho);
        $comentarios = $this->juradoPopularMapper->listarComentarios($idPincho);
        $this->view->setVariable("comentarios",$comentarios);
        if ($pincho != null) {
            $this->view->render("pincho", "consultarPincho");
        } else {
            $this->index();
        }
    }

    /**
     * Mostrar Gastromapa
     */

    public function gastromapa()
    {
        $direcciones = $this->establecimientoMapper->listarDirecciones();
        $this->view->setVariable("direcciones", $direcciones);
        $this->view->render("pincho", "gastromapa");
    }

    /**
     * Insertar comentario
     */

    public function insertarComentario(){
        if(isset($this->currentUser) && $this->juradoPopularMapper->existeUsuario($this->username)){
            $nombre = $this->juradoPopularMapper->consultarUsuario($this->currentUser->getDniJp());
            $nombre = $nombre["nombreJP"];
            if(isset($_POST["idPincho"]) && isset($_POST["comentario"])){
                $this->juradoPopularMapper->insertarComentarios($_POST["idPincho"],$this->currentUser->getDniJp(), $nombre,$_POST["comentario"]);
            }
            header("Location: index.php?controller=pincho&action=consultarPincho&idPincho=".$_POST["idPincho"]."#seccionCom");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }
}