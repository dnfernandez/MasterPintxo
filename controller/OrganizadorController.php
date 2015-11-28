<?php

require_once(__DIR__ . "/../model/Organizador.php");
require_once(__DIR__ . "/../model/OrganizadorMapper.php");
require_once(__DIR__ . "/../model/JuradoProfesional.php");
require_once(__DIR__ . "/../model/JuradoProfesionalMapper.php");
require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");
require_once(__DIR__."/../model/Establecimiento.php");
require_once(__DIR__."/../model/EstablecimientoMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class OrganizadorController extends BaseController
{
    private $pinchoMapper;
    private $organizadorMapper;
    private $juradoProfesionalMapper;
    private $juradoPopularMapper;
    private $establecimientoMapper;

    public function __construct()
    {
        parent::__construct();

        $this->organizadorMapper = new OrganizadorMapper();
        $this->pinchoMapper = new PinchoMapper();
        $this->juradoProfesionalMapper = new JuradoProfesionalMapper();
        $this->juradoPopularMapper = new JuradoPopularMapper();
        $this->establecimientoMapper = new EstablecimientoMapper();
    }

    public function index()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $listaPinProp = $this->pinchoMapper->consultarPinchosPropuestos();
            $this->view->setVariable("listaPinProp", $listaPinProp);
            $this->view->render("organizador", "inicioOrganizador");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    /**
     * Acepta o deniega la propuesta de pincho
     */

    public function validarPropuesta()
    {

        if (isset($_POST["aceptar"])) {
            if (isset($_POST["idPincho"])) {
                $this->pinchoMapper->actualizarPropuestaPincho($_POST['idPincho']);
            }
        }
        if (isset($_POST["denegar"])) {
            if (isset($_POST["idPincho"])) {
                $this->pinchoMapper->rechazarPincho($_POST["idPincho"]);
            }
        }

        $this->view->redirect("organizador", "index#seccionI");
    }

    /**
     * muestra la vista con los pinchos y los jurados
     */

    public function asignarPinchosVista()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $listaPinchos = $this->organizadorMapper->listarNoAsignados();
            $listaJuradoProfesional = $this->juradoProfesionalMapper->listarJurados();
            $this->view->setVariable("listaPinchoO", $listaPinchos);
            $this->view->setVariable("listaJuradoProfesional", $listaJuradoProfesional);
            $this->view->render("organizador", "asignarPinchos");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    /**
     * asigna el pincho a un jurado
     */

    public function asignarPinchos()
    {
        $listaPinchos = $this->organizadorMapper->listarNoAsignados();
        $listaJuradoProfesional = $this->juradoProfesionalMapper->listarJurados();

        foreach ($listaPinchos as $pincho) {
            foreach ($listaJuradoProfesional as $jurado) {
                if (($pincho["idPincho"] == $_POST["pincho" . $pincho["idPincho"]]) && ($jurado["dniJPro"] == $_POST["jurado" . $pincho["idPincho"]])) {
                    $this->organizadorMapper->asignarElegidos($pincho["idPincho"], $jurado["dniJPro"]);
                }
            }
        }

        $this->view->redirect("organizador", "index#seccionI");
    }

    /**
     * vista del panel del control
     */

    public function panelControlVista()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $this->view->render("organizador", "panelControl");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }

    }

    /**
     * asigna los finalistas para que puedan ser valorados
     */

    public function asignarFinalistas()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $this->organizadorMapper->asignarFinalistas();
            $this->view->redirect("organizador", "index#seccionI");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    /**
     * Lista jurado popular
     */

    public function listarJPop()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $lista = $this->juradoPopularMapper->listarJurados();
            $listaJurado = array();
            foreach($lista as $jp){
                if($this->organizadorMapper->buscarBaneo($jp["dniJP"])){
                    $jur = array('dniJP' => $jp['dniJP'], 'nombreJP' => $jp["nombreJP"], 'estado' => 'baneado');
                    array_push($listaJurado,$jur);
                }else{
                    $jur = array('dniJP' => $jp['dniJP'], 'nombreJP' => $jp["nombreJP"], 'estado' => 'no baneado');
                    array_push($listaJurado,$jur);
                }
            }

            $this->view->setVariable("listado",$listaJurado);
            $this->view->render("organizador", "listaJPop");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }

    }

    /**
     * Lista jurado profesional
     */

    public function listarJPro()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $lista = $this->juradoProfesionalMapper->listarJurados();
            $listaJurado = array();
            foreach($lista as $jp){
                if($this->organizadorMapper->buscarBaneo($jp["dniJPro"])){
                    $jur = array('dniJP' => $jp['dniJPro'], 'nombreJP' => $jp["nombreJPro"], 'estado' => 'baneado');
                    array_push($listaJurado,$jur);
                }else{
                    $jur = array('dniJP' => $jp['dniJPro'], 'nombreJP' => $jp["nombreJPro"], 'estado' => 'no baneado');
                    array_push($listaJurado,$jur);
                }
            }

            $this->view->setVariable("listado",$listaJurado);
            $this->view->render("organizador", "listaJPro");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }

    }

    /**
     * Lista establecimientos
     */

    public function listarEst()
    {
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username)) {
            $lista = $this->establecimientoMapper->findAll();
            $listaEst = array();
            foreach($lista as $est){
                if($this->organizadorMapper->buscarBaneo($est["nif"])){
                    $estab = array('nif' => $est['nif'], 'nombreE' => $est["nombreE"], 'estado' => 'baneado');
                    array_push($listaEst,$estab);
                }else{
                    $estab = array('nif' => $est['nif'], 'nombreE' => $est["nombreE"], 'estado' => 'no baneado');
                    array_push($listaEst,$estab);
                }
            }

            $this->view->setVariable("listado",$listaEst);
            $this->view->render("organizador", "listaEst");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }

    }

    /**
     * Banear
     */

    public function banear(){
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username) && isset($_GET["idUsuario"])) {
            $this->organizadorMapper->banear($_GET["idUsuario"]);
            $this->view->redirect("organizador",$_GET["listar"]."#seccionL");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    /**
     * Desbanear
     */

    public function desbanear(){
        if (isset($this->currentUser) && $this->organizadorMapper->comprobarUsuario($this->username) && isset($_GET["idUsuario"])) {
            $this->organizadorMapper->desBanear($_GET["idUsuario"]);
            $this->view->redirect("organizador",$_GET["listar"]."#seccionL");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }


}