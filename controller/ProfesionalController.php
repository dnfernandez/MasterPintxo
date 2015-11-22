<?php

require_once(__DIR__ . "/../model/JuradoProfesional.php");
require_once(__DIR__ . "/../model/JuradoProfesionalMapper.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class ProfesionalController extends BaseController
{
    private $juradoProfesionalMapper;
    private $pinchoMapper;

    public function __construct()
    {
        parent::__construct();

        $this->juradoProfesionalMapper = new JuradoProfesionalMapper();
        $this->pinchoMapper = new PinchoMapper();
    }

    public function index()
    {
        $valorarFinalistas = $this->juradoProfesionalMapper->listarValorarPinchosJpro($this->currentUser->getDniJpro());
        $elegirFinalistas = $this->juradoProfesionalMapper->listarElegirFinalistas($this->currentUser->getDniJpro());

        if ($valorarFinalistas == null) {
            $this->view->setVariable("listaElegir", $elegirFinalistas);
            $this->view->render("profesional", "inicioJpro");
        } else {
            $this->view->setVariable("listaFinalistas", $valorarFinalistas);
            $this->view->render("profesional", "valorarFinalistas");
        }
    }

    public function elegirFinalistas()
    {
        if (isset($this->currentUser)) {
            foreach ($_POST["pincho"] as $pincho) {
                $this->juradoProfesionalMapper->elegirFinalistas($pincho, '1', $this->currentUser->getDniJpro());
                $this->pinchoMapper->actualizarPinchoFinalista($pincho);
            }
        }
        $this->view->redirect("profesional", "index#seccionI");
    }

    public function valorarFinalistas()
    {
        if (isset($this->currentUser)) {
            $tam = sizeof($_POST["pincho"]);
            $pincho = $_POST["pincho"];
            $presentacion = $_POST["presentacion"];
            $sabor = $_POST["sabor"];
            $textura = $_POST["textura"];
            $originalidad = $_POST["originalidad"];
            for ($i = 0; $i < $tam; $i++) {
                if ((is_numeric($presentacion[$i]) && is_numeric($sabor[$i]) && is_numeric($textura[$i]) && is_numeric($originalidad[$i])) && ($presentacion[$i] >= 0 && $presentacion[$i] <= 10) && ($sabor[$i] >= 0 && $sabor[$i] <= 10) && ($textura[$i] >= 0 && $textura[$i] <= 10) && ($originalidad[$i] >= 0 && $originalidad[$i] <= 10)) {
                    $valoracion = "Presentacion: " . $presentacion[$i] . "; Sabor: " . $sabor[$i] . "! Textura: " . $textura[$i] . "? Originalidad: " . $originalidad[$i] . "¡";
                    //echo "Pincho: " . $pincho[$i] . " ----- Valoracion: " . $valoracion . "<br>";
                    $this->juradoProfesionalMapper->valorarPinchosJpro($pincho[$i],$this->currentUser->getDniJPro(),$valoracion);
                }
            }
        }
        $this->view->redirect("profesional", "index#seccionI");
    }

}