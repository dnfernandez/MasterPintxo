<?php

require_once(__DIR__ . "/../model/Organizador.php");
require_once(__DIR__ . "/../model/OrganizadorMapper.php");
require_once(__DIR__ . "/../model/JuradoProfesional.php");
require_once(__DIR__ . "/../model/JuradoProfesionalMapper.php");
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class OrganizadorController extends BaseController
{
    private $pinchoMapper;
    private $organizadorMapper;
    private $juradoProfesionalMapper;

    public function __construct()
    {
        parent::__construct();

        $this->organizadorMapper = new OrganizadorMapper();
        $this->pinchoMapper = new PinchoMapper();
        $this->juradoProfesionalMapper = new JuradoProfesionalMapper();
    }

    public function index(){
        if(isset($this->currentUser)) {
            $listaPinProp = $this->pinchoMapper->consultarPinchosPropuestos();
            $this->view->setVariable("listaPinProp",$listaPinProp);
            $this->view->render("organizador","inicioOrganizador");
        }
    }

    /**
     * Acepta o deniega la propuesta de pincho
     */

    public function validarPropuesta(){

        if(isset($_POST["aceptar"])){
            if(isset($_POST["idPincho"])){
                $this->pinchoMapper->actualizarPropuestaPincho($_POST['idPincho']);
            }
        }
        if(isset($_POST["denegar"])){
            if(isset($_POST["idPincho"])){
                $this->pinchoMapper->rechazarPincho($_POST["idPincho"]);
            }
        }

        $this->view->redirect("organizador","index#seccionI");
    }

    /**
     * muestra la vista con los pinchos y los jurados
     */

    public function asignarPinchosVista(){
        $listaPinchos = $this->organizadorMapper->listarNoAsignados();
        $listaJuradoProfesional = $this->juradoProfesionalMapper->listarJurados();
        $this->view->setVariable("listaPinchoO",$listaPinchos);
        $this->view->setVariable("listaJuradoProfesional",$listaJuradoProfesional);
        $this->view->render("organizador","asignarPinchos");
    }

    /**
     * asigna el pincho a un jurado
     */

    public function asignarPinchos(){
        $listaPinchos = $this->organizadorMapper->listarNoAsignados();
        $listaJuradoProfesional = $this->juradoProfesionalMapper->listarJurados();

        foreach($listaPinchos as $pincho){
            foreach($listaJuradoProfesional as $jurado){
                if(($pincho["idPincho"] == $_POST["pincho".$pincho["idPincho"]]) && ($jurado["dniJPro"] == $_POST["jurado".$pincho["idPincho"]])){
                    $this->organizadorMapper->asignarElegidos($pincho["idPincho"],$jurado["dniJPro"]);
                }
            }
        }

        $this->view->redirect("organizador","index#seccionI");
    }

    /**
     * vista del panel del control
     */

    public function panelControlVista(){
        $this->view->render("organizador","panelControl");
    }

    /**
     * asigna los finalistas para que puedan ser valorados
     */

    public function asignarFinalistas(){
        $this->organizadorMapper->asignarFinalistas();
        $this->view->redirect("organizador","index#seccionI");
    }



}