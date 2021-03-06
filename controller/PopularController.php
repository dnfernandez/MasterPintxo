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
        if (isset($this->currentUser) && $this->juradoPopularMapper->existeUsuario($this->username)) {
            $numCodigos = $this->juradoPopularMapper->codigosSinUsar($this->currentUser->getDniJp());
            if (isset($numCodigos) && $numCodigos < 3) {
                $this->view->setVariable("numCodigos", $numCodigos);
                $this->view->render("popular", "inicioJuradoPopular");
            } else {
                $listaPinchos = $this->juradoPopularMapper->recuperarPinchos($this->currentUser->getDniJp());
                $this->view->setVariable("listaPinchosVotar", $listaPinchos);
                $this->view->render("popular", "votar");
            }
        }else{
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    public function introducirCodigos()
    {
        if (isset($this->currentUser) && $this->juradoPopularMapper->existeUsuario($this->username)) {
            $codigo1 = $_POST["cod1"];
            $codigo2 = $_POST["cod2"];
            $codigo3 = $_POST["cod3"];
            if($this->juradoPopularMapper->comprobarNifPinchos($codigo1,$codigo2,$codigo3)){
                if (isset($codigo1)) {
                    $this->juradoPopularMapper->introducirCodigosJP($codigo1, $this->currentUser->getDniJp());
                }
                if (isset($codigo2)) {
                    $this->juradoPopularMapper->introducirCodigosJP($codigo2, $this->currentUser->getDniJp());
                }
                if (isset($codigo3)) {
                    $this->juradoPopularMapper->introducirCodigosJP($codigo3, $this->currentUser->getDniJp());
                }
            }else{
                $this->view->setFlash(i18n("Debes introducir c&oacute;digos de distintos pinchos y que no esten usados"));
            }

            $this->view->redirect("popular", "index#seccionI");
        }else{
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }



    public function votar()
    {
        if (isset($this->currentUser) && $this->juradoPopularMapper->existeUsuario($this->username)) {
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
        }else{
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }
}
