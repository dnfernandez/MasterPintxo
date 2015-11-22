<?php

require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class PopularController extends BaseController
{

    private $juradoPopularMapper;

    public function __construct()
    {
        parent::__construct();

        $this->juradoPopularMapper = new JuradoPopularMapper();
    }

    public function index()
    {
        $numCodigos = $this->juradoPopularMapper->codigosSinUsar($this->currentUser->getDniJp());
        if (isset($numCodigos) && $numCodigos < 3) {
            $this->view->setVariable("numCodigos", $numCodigos);
            $this->view->render("popular", "inicioJuradoPopular");
        } else {
            $listaPinchos = $this->juradoPopularMapper->recuperarPinchos($this->currentUser->getDniJp());
            $this->view->setVariable("listaPinchosVotar", $listaPinchos);
            $this->view->render("popular", "votar");
        }
    }

    public function introducirCodigos()
    {
        if (isset($this->currentUser)) {
            $codigo1 = $_POST["cod1"];
            $codigo2 = $_POST["cod2"];
            $codigo3 = $_POST["cod3"];

            if (isset($codigo1)) {
                $this->juradoPopularMapper->introducirCodigosJP($codigo1, $this->currentUser->getDniJp());
            }
            if (isset($codigo2)) {
                $this->juradoPopularMapper->introducirCodigosJP($codigo2, $this->currentUser->getDniJp());
            }
            if (isset($codigo3)) {
                $this->juradoPopularMapper->introducirCodigosJP($codigo3, $this->currentUser->getDniJp());
            }

            $this->view->redirect("popular", "index#seccionI");
        }
    }

    public function votar()
    {
        if (isset($this->currentUser)) {
            $listaCodigos = $_POST["codigos"];
            $listaPinchos = $_POST["pinchos"];
            $pinchoVotar = $_POST["pincho"];
            for($i=0; $i<3;$i++){
                if($listaPinchos[$i] == $pinchoVotar){
                    $this->juradoPopularMapper->seleccionarPinchoJP($pinchoVotar,$this->currentUser->getDniJp(),$listaCodigos[$i]);
                    $pinchoVotar="ya voto";
                }else{
                    $this->juradoPopularMapper->usarCodigo($listaCodigos[$i]);
                }
            }
            $this->view->redirect("popular","index#seccionI");
        }
    }
}
