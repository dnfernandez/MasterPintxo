<?php
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");
require_once(__DIR__ . "/../model/Establecimiento.php");
require_once(__DIR__ . "/../model/EstablecimientoMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");
class EstablecimientoController extends BaseController
{
    private $pinchoMapper;
    private $establecimientoMapper;

    /**
     * EstablecimientoController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pinchoMapper = new PinchoMapper();
        $this->establecimientoMapper = new EstablecimientoMapper();

    }

    public function index(){
        if(isset($this->currentUser)) {
            if (!$this->establecimientoMapper->pinchoPresentado($this->currentUser->getNif())) {
                $this->view->render("establecimiento","crearPincho_Est");
            }
            if($this->establecimientoMapper->pinchoPresentado($this->currentUser->getNif())){
                $pincho = $this->establecimientoMapper->findPincho($this->currentUser->getNif());
                if($pincho["confirmado"] == '1'){
                    $this->view->setVariable("pinchoEst",$pincho);
                    $this->view->render("establecimiento","modificarPincho_Est");
                }else if($pincho["concursante"]=='1'){
                    $codigos = $this->establecimientoMapper->listarCodigosDisponibles($this->currentUser->getNif());
                    $this->view->setVariable("codigosEst",$codigos);
                    $this->view->render("establecimiento","codigos_Est");
                }else{
                    $this->view->render("establecimiento","espera_Est");
                }
            }
        }
    }

    public function crearPincho(){
        if(isset($this->currentUser)) {
            $pincho = new Pincho();
            $id=$this->pinchoMapper->ultimoIdPincho();
            $idPincho = $id[0] + 1;
            $cadena=basename( $_FILES['uploadedfile']['name']);
            $total=strpos($cadena,".");
            $extensionImg = substr($cadena,$total);
            $extensionImg = strtolower($extensionImg);
            $target_path = "images-pinchos/";
            $target_path = $target_path . "pincho".$idPincho.$extensionImg;
            move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
            $pincho->setIdPincho($idPincho);
            $pincho->setNombreP($_POST["namePin"]);
            $pincho->setDescripcionP($_POST["descripPin"]);
            $pincho->setPrecio($_POST["precioPin"]);
            $pincho->setConcursante('0');
            $pincho->setFinalista('0');
            $pincho->setEstablecimientoNif($this->currentUser->getNif());
            $pincho->setRutaImagen($target_path);
            $pincho->setConfirmado('0');

            try{
                $pincho->validoParaCrear();
                $this->pinchoMapper->insertar($pincho);
                $this->view->redirect("establecimiento","index#seccionI");
            }catch (ValidationException $ex){
                $errors = $ex->getErrors();
                $this->view->setVariable("errors", $errors, true);
                $this->view->redirect("establecimiento","index#seccionI");
            }

        }
    }

    public function modificarPincho(){
        if(isset($this->currentUser)) {
            if(isset($_GET["idPincho"])){
                $pincho = new Pincho();
                $cadena=basename( $_FILES['uploadedfile']['name']);
                $total=strpos($cadena,".");
                $extensionImg = substr($cadena,$total);
                $extensionImg = strtolower($extensionImg);
                $target_path = "images-pinchos/";
                $target_path = $target_path . "pincho".$_GET["idPincho"].$extensionImg;
                move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path);
                $pincho->setIdPincho($_GET["idPincho"]);
                $pincho->setNombreP($_POST["namePin"]);
                $pincho->setDescripcionP($_POST["descripPin"]);
                $pincho->setPrecio($_POST["precioPin"]);
                $pincho->setConcursante('0');
                $pincho->setFinalista('0');
                $pincho->setEstablecimientoNif($this->currentUser->getNif());
                $pincho->setRutaImagen($target_path);
                $pincho->setConfirmado('0');

                try{
                    $pincho->validoParaActualizar();
                    $this->pinchoMapper->modificar($pincho);
                    $this->view->redirect("establecimiento","index#seccionI");
                }catch (ValidationException $ex){
                    $errors = $ex->getErrors();
                    $this->view->setVariable("errors", $errors, true);
                    $this->view->redirect("establecimiento","index#seccionI");
                }
            }else{
                //throw new Exception("Se necesita el id de pincho");
                echo "Un problema ha ocurrido! Se necesita id de pincho<br>";
                echo "Redirigiendo...";
                header("Refresh: 5; index.php");
            }
        }
    }

    public function generarCodigos(){
        if(isset($this->currentUser)) {
            $this->establecimientoMapper->generarCodigos($this->currentUser->getNif(),$_POST["cantidad"]);
            $codigos = $this->establecimientoMapper->listarCodigosDisponibles($this->currentUser->getNif());
            $this->view->setVariable("codigosEst",$codigos);
            $this->view->redirect("establecimiento","index#seccionI");
        }
    }


}