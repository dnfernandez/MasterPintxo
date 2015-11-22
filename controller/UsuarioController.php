<?php

require_once(__DIR__ . "/../model/Establecimiento.php");
require_once(__DIR__ . "/../model/EstablecimientoMapper.php");
require_once(__DIR__ . "/../model/Organizador.php");
require_once(__DIR__ . "/../model/OrganizadorMapper.php");
require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");
require_once(__DIR__ . "/../model/JuradoProfesional.php");
require_once(__DIR__ . "/../model/JuradoProfesionalMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class UsuarioController extends BaseController
{

    private $establecimientoMapper;
    private $organizadorMapper;
    private $juradoPopularMapper;
    private $juradoProfesionalMapper;

    /**
     * UsuarioController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->establecimientoMapper = new EstablecimientoMapper();
        $this->organizadorMapper = new OrganizadorMapper();
        $this->juradoPopularMapper = new JuradoPopularMapper();
        $this->juradoProfesionalMapper = new JuradoProfesionalMapper();
    }

    public function index()
    {
        if (isset($_SESSION["currentuser"])) {
            if ($this->organizadorMapper->comprobarUsuario($_SESSION["currentuser"])) {
                $this->view->redirect("organizador", "index#seccionI");
            } else if ($this->establecimientoMapper->consultar($_SESSION["currentuser"])) {
                $this->view->redirect("establecimiento", "index#seccionI");
            } else if ($this->juradoProfesionalMapper->existeUsuario($_SESSION["currentuser"])) {
                $this->view->redirect("profesional", "index#seccionI");
            } else if ($this->juradoPopularMapper->existeUsuario($_SESSION["currentuser"])) {
                $this->view->redirect("popular", "index#seccionI");
            }
        }
        $this->view->render("usuario", "login");
    }

    /**
     * Accion de login
     */

    public function login()
    {
        if (isset($_POST["login"])) {
            $login = $_POST["login"];
            $pass = $_POST["pass"];
            if ($this->establecimientoMapper->consultar($login)) {
                if ($this->establecimientoMapper->comprobarUsuario($login, $pass)) {
                    $_SESSION["currentuser"] = $_POST["login"];
                    $this->view->redirect("usuario", "index");
                    $this->view->setVariable("currentusername", $_POST["login"]);
                } else {
                    $errors = array();
                    $errors["general"] = "Usuario no valido";
                    $this->view->setVariable("errors", $errors);
                }
            } else if ($this->organizadorMapper->comprobarUsuario($login)) {
                if ($this->organizadorMapper->existeUsuario($login, $pass)) {
                    $_SESSION["currentuser"] = $_POST["login"];
                    $this->view->redirect("usuario", "index");
                    $this->view->setVariable("currentusername", $_POST["login"]);
                } else {
                    $errors = array();
                    $errors["general"] = "Usuario no valido";
                    $this->view->setVariable("errors", $errors);
                }
            } else if ($this->juradoProfesionalMapper->existeUsuario($login)) {
                if ($this->juradoProfesionalMapper->comprobarUsuario($login, $pass)) {
                    $_SESSION["currentuser"] = $_POST["login"];
                    $this->view->redirect("usuario", "index");
                    $this->view->setVariable("currentusername", $_POST["login"]);
                } else {
                    $errors = array();
                    $errors["general"] = "Usuario no valido";
                    $this->view->setVariable("errors", $errors);
                }
            } else if ($this->juradoPopularMapper->existeUsuario($login)) {
                if ($this->juradoPopularMapper->comprobarUsuario($login, $pass)) {
                    $_SESSION["currentuser"] = $_POST["login"];
                    $this->view->redirect("usuario", "index");
                    $this->view->setVariable("currentusername", $_POST["login"]);
                } else {
                    $errors = array();
                    $errors["general"] = "Usuario no valido";
                    $this->view->setVariable("errors", $errors);
                }
            }
        }
        $this->view->redirect("usuario", "index");
    }

    /**
     * Accion de logout
     */
    public function logout()
    {
        session_destroy();
        $this->view->redirect("pincho", "index");

    }

    /**
     * Accion para mostrar el registro de establecimiento
     */
    public function registrarEstablecimientoVista()
    {
        $this->view->render("usuario", "registroEstablecimiento");
    }

    /**
     * Accion de registrar
     */

    public function registrarEstablecimiento()
    {
        if (isset($_POST["login"])) {
            $login = $_POST["login"];
            if (!$this->organizadorMapper->comprobarUsuario($login) && !$this->establecimientoMapper->consultar($login) && !$this->juradoProfesionalMapper->existeUsuario($login) && !$this->juradoPopuplarMapper->existeUsuario($login)) {
                $establecimiento = new Establecimiento();
                $establecimiento->setNif($login);
                $establecimiento->setNombreE($_POST["name"]);
                $establecimiento->setDireccionE($_POST["direccion"]);
                $establecimiento->setTelfE($_POST["telf"]);
                $pass = $_POST["pass"];
                $pass2 = $_POST["pass2"];
                if ($pass != $pass2) {
                    $errors = array();
                    $errors["contrasenhaDistintas"] = "Las contrase&ntilde;as no coinciden";
                    $this->view->setVariable("errors", $errors);
                    $this->view->setFlash("Las contrase&ntilde;as no coinciden");
                } else {
                    $establecimiento->setContrasenha($pass);

                    try {
                        $establecimiento->validoParaCrear();
                        $this->establecimientoMapper->crear($establecimiento);
                        $this->view->redirect("usuario", "index");
                    } catch (ValidationException $ex) {
                        $errors = $ex->getErrors();
                        $this->view->setVariable("errors", $errors);
                    }
                }
                $this->view->redirect("usuario", "registrarEstablecimientoVista");


            } else {
                echo "Ya existe un usuario en el sistema con ese login, por favor, elija otro";
                echo "<br>Redireccionando...";
                header("Refresh: 5; index.php?controller=usuario&action=registrarEstablecimientoVista");

            }
        }
    }

    /**
     * Accion para mostrar el registro de usuario
     */
    public function registrarPopularVista()
    {
        $this->view->render("usuario", "registroUsuario");
    }

    /**
     * Accion de registrar
     */

    public function registrarPopular()
    {
        if (isset($_POST["login"])) {
            $login = $_POST["login"];
            if (!$this->organizadorMapper->comprobarUsuario($login) && !$this->establecimientoMapper->consultar($login) && !$this->juradoProfesionalMapper->existeUsuario($login) && !$this->juradoPopuplarMapper->existeUsuario($login)) {
                $popular = new JuradoPopular();
                $popular->setDniJp($login);
                $popular->setNombreJp($_POST["name"]);
                $popular->setDireccionJp($_POST["direccion"]);
                $popular->setCp($_POST["cp"]);
                $popular->setApellidosJp($_POST["apellidos"]);
                $pass = $_POST["pass"];
                $pass2 = $_POST["pass2"];
                if ($pass != $pass2) {
                    $errors = array();
                    $errors["contrasenhaDistintasPop"] = "Las contrase&ntilde;as no coinciden";
                    $this->view->setVariable("errors", $errors);
                    $this->view->setFlash("Las contrase&ntilde;as no coinciden");
                } else {
                    $popular->setContrasenhaJp($pass);

                    try {
                        $popular->validoParaCrear();
                        $this->juradoPopularMapper->insertar($popular);
                        $this->view->redirect("usuario", "index");
                    } catch (ValidationException $ex) {
                        $errors = $ex->getErrors();
                        $this->view->setVariable("errors", $errors);
                    }
                }
                $this->view->redirect("usuario", "registrarPopularVista");


            } else {
                echo "Ya existe un usuario en el sistema con ese login, por favor, elija otro";
                echo "<br>Redireccionando...";
                header("Refresh: 5; index.php?controller=usuario&action=registrarPopularVista");

            }
        }
    }

    /**
     * Accion para mostrar el registro de profesional
     */
    public function registrarProfesionalVista()
    {
        $this->view->render("usuario", "crearJpro");
    }

    /**
     * Accion de registrar
     */

    public function registrarProfesional()
    {
        if (isset($_POST["login"])) {
            $login = $_POST["login"];
            if (!$this->organizadorMapper->comprobarUsuario($login) && !$this->establecimientoMapper->consultar($login) && !$this->juradoProfesionalMapper->existeUsuario($login) && !$this->juradoPopuplarMapper->existeUsuario($login)) {
                $profesional = new JuradoProfesional();
                $profesional->setDniJpro($login);
                $profesional->setNombreJpro($_POST["name"]);
                $profesional->setTelefJpro($_POST["telf"]);
                $pass = $_POST["pass"];
                $pass2 = $_POST["pass2"];
                if ($pass != $pass2) {
                    $errors = array();
                    $errors["contrasenhaDistintasPro"] = "Las contrase&ntilde;as no coinciden";
                    $this->view->setVariable("errors", $errors);
                    $this->view->setFlash("Las contrase&ntilde;as no coinciden");
                } else {
                    $profesional->setContrasenhaJpro($pass);

                    try {
                        $profesional->validoParaCrear();
                        $this->juradoProfesionalMapper->insertar($profesional);
                        $this->view->redirect("usuario", "index");
                    } catch (ValidationException $ex) {
                        $errors = $ex->getErrors();
                        $this->view->setVariable("errors", $errors);
                    }
                }
                $this->view->redirect("usuario", "registrarProfesionalVista");


            } else {
                echo "Ya existe un usuario en el sistema con ese login, por favor, elija otro";
                echo "<br>Redireccionando...";
                header("Refresh: 5; index.php?controller=usuario&action=registrarProfesionalVista");

            }
        }
    }

}



























