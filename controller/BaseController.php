<?php
//file: controller/BaseController.php
require_once(__DIR__ . "/../nucleo/ViewManager.php");
require_once(__DIR__ . "/../model/Establecimiento.php");
require_once(__DIR__ . "/../model/EstablecimientoMapper.php");
require_once(__DIR__ . "/../model/JuradoProfesional.php");
require_once(__DIR__ . "/../model/JuradoProfesionalMapper.php");
require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");
require_once(__DIR__ . "/../model/Organizador.php");
require_once(__DIR__ . "/../model/OrganizadorMapper.php");

class BaseController
{

    /**
     * The view manager instance
     * @var ViewManager
     */
    protected $view;

    /**
     * The current user instance
     * @var User
     */
    protected $currentUser;
    protected $username;

    private $estMapper;
    private $orgMapper;
    private $jurPopMapper;
    private $jurProMapper;

    public function __construct()
    {

        $this->view = ViewManager::getInstance();

        $this->estMapper = new EstablecimientoMapper();
        $this->orgMapper = new OrganizadorMapper();
        $this->jurPopMapper = new JuradoPopularMapper();
        $this->jurProMapper = new JuradoProfesionalMapper();

        // get the current user and put it to the view
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["currentuser"])) {

            if ($this->orgMapper->comprobarUsuario($_SESSION["currentuser"])) {
                $this->currentUser = new Organizador($_SESSION["currentuser"]);
                $this->view->setVariable("currentusername", $this->currentUser->getIdOrganizador());
                $this->username = $this->currentUser->getIdOrganizador();
            } else if ($this->estMapper->consultar($_SESSION["currentuser"])) {
                $this->currentUser = new Establecimiento($_SESSION["currentuser"]);
                $this->view->setVariable("currentusername", $this->currentUser->getNif());
                $this->username = $this->currentUser->getNif();
            } else if ($this->jurProMapper->existeUsuario($_SESSION["currentuser"])) {
                $this->currentUser = new JuradoProfesional($_SESSION["currentuser"]);
                $this->view->setVariable("currentusername", $this->currentUser->getDniJpro());
                $this->username = $this->currentUser->getDniJpro();
            } else if ($this->jurPopMapper->existeUsuario($_SESSION["currentuser"])) {
                $this->currentUser = new JuradoPopular($_SESSION["currentuser"]);
                $this->view->setVariable("currentusername", $this->currentUser->getDniJp());
                $this->username = $this->currentUser->getDniJp();
            }


        }
    }
}
