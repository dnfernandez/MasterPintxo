<?php
require_once(__DIR__ . "/../model/Pincho.php");
require_once(__DIR__ . "/../model/PinchoMapper.php");
require_once(__DIR__ . "/../model/Premio.php");
require_once(__DIR__ . "/../model/PremioMapper.php");
require_once(__DIR__ . "/../model/JuradoPopular.php");
require_once(__DIR__ . "/../model/JuradoPopularMapper.php");

require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../nucleo/ViewManager.php");

class PremioController extends BaseController
{
    private $pinchoMapper;
    private $premioMapper;
    private $juradoPopularMapper;

    /**
     * PinchoController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pinchoMapper = new PinchoMapper();
        $this->premioMapper = new PremioMapper();
        $this->juradoPopularMapper = new JuradoPopularMapper();
    }

    public function index()
    {
        if ($this->premioMapper->existenPremios()) {
            $premios = $this->premioMapper->listarPremios();
            $this->view->setVariable("premios", $premios);
            $this->view->render("premio", "listaPremios");
        } else {
            $this->view->render("premio", "premiosNo");
        }

    }

    public function premioJP()
    {
        if ($this->premioMapper->existenPremiosJP()) {
            $premios = $this->premioMapper->listarPremiosJP();
            $this->view->setVariable("premios", $premios);
            $this->view->render("premio", "premiosJP");
        } else {
            $this->view->render("premio", "premiosNo");
        }

    }

    public function calcularPremio()
    {
        $organizador = $this->view->getVariable("organizador");
        if (isset($this->currentUser) && isset($organizador)) {
            $pinchos = $this->pinchoMapper->listarPinchosFinalistas();
            if (isset($pinchos)) {
                $mediaPinchos = Array();
                foreach ($pinchos as $pincho) {
                    $valoracion = $this->premioMapper->obtenerValoracion($pincho["idPincho"]);
                    if (isset($valoracion)) {
                        $valPin = array("idPincho" => $pincho["idPincho"], "sumP" => "", "sumS" => "", "sumT" => "", "sumO" => "");
                        $cont = 0;
                        foreach ($valoracion as $v) {
                            $cont++;

                            //Presentacion
                            $comienzo = "n: ";
                            $final = ";";
                            $contC = strpos($v["puntuacion"], $comienzo);
                            $contF = strpos($v["puntuacion"], $final);
                            $descripcion = substr($v["puntuacion"], $contC + 3, $contF - $contC - 3);
                            $valPin["sumP"] += $descripcion;

                            //Sabor
                            $comienzo = "r: ";
                            $final = "!";
                            $contC = strpos($v["puntuacion"], $comienzo);
                            $contF = strpos($v["puntuacion"], $final);
                            $sabor = substr($v["puntuacion"], $contC + 3, $contF - $contC - 3);
                            $valPin["sumS"] += $sabor;

                            //Textura
                            $comienzo = "a: ";
                            $final = "?";
                            $contC = strpos($v["puntuacion"], $comienzo);
                            $contF = strpos($v["puntuacion"], $final);
                            $textura = substr($v["puntuacion"], $contC + 3, $contF - $contC - 3);
                            $valPin["sumT"] += $textura;

                            //Originalidad
                            $comienzo = "d: ";
                            $final = "¡";
                            $contC = strpos($v["puntuacion"], $comienzo);
                            $contF = strpos($v["puntuacion"], $final);
                            $originalidad = substr($v["puntuacion"], $contC + 3, $contF - $contC - 3);
                            $valPin["sumO"] += $originalidad;
                        }
                        $valPin["sumP"] /= $cont;
                        $valPin["sumS"] /= $cont;
                        $valPin["sumT"] /= $cont;
                        $valPin["sumO"] /= $cont;
                        array_push($mediaPinchos, $valPin);
                    }
                }

                $premio = array("primerP" => "", "segundoP" => "", "terceroP" => "", "primerS" => "", "segundoS" => "", "terceroS" => "", "primerT" => "", "segundoT" => "", "terceroT" => "", "primerO" => "", "segundoO" => "", "terceroO" => "");
                $valorPremio = array("primerP" => 0, "segundoP" => 0, "terceroP" => 0, "primerS" => 0, "segundoS" => 0, "terceroS" => 0, "primerT" => 0, "segundoT" => 0, "terceroT" => 0, "primerO" => 0, "segundoO" => 0, "terceroO" => 0);

                while (!empty($mediaPinchos)) {
                    $array = array_pop($mediaPinchos);
                    //echo $array["idPincho"] . " ------- " . $array["sumP"] . " ------- " . $array["sumS"] . " ------- " . $array["sumT"] . " ------- " . $array["sumO"] . "<br>";

                    //Presentacion
                    if ($valorPremio["primerP"] < $array["sumP"]) {
                        $valorPremio["terceroP"] = $valorPremio["segundoP"];
                        $premio["terceroP"] = $premio["segundoP"];
                        $valorPremio["segundoP"] = $valorPremio["primerP"];
                        $premio["segundoP"] = $premio["primerP"];
                        $valorPremio["primerP"] = $array["sumP"];
                        $premio["primerP"] = $array["idPincho"];
                    } elseif ($array["sumP"] < $valorPremio["primerP"] && $array["sumP"] > $valorPremio["segundoP"]) {
                        $valorPremio["terceroP"] = $valorPremio["segundoP"];
                        $premio["terceroP"] = $premio["segundoP"];
                        $valorPremio["segundoP"] = $array["sumP"];
                        $premio["segundoP"] = $array["idPincho"];
                    } elseif ($array["sumP"] < $valorPremio["segundoP"] && $array["sumP"] > $valorPremio["terceroP"]) {
                        $valorPremio["terceroP"] = $array["sumP"];
                        $premio["terceroP"] = $array["idPincho"];
                    }


                    //Sabor
                    if ($array["sumS"] > $valorPremio["primerS"]) {
                        $valorPremio["terceroS"] = $valorPremio["segundoS"];
                        $premio["terceroS"] = $premio["segundoS"];
                        $valorPremio["segundoS"] = $valorPremio["primerS"];
                        $premio["segundoS"] = $premio["primerS"];
                        $valorPremio["primerS"] = $array["sumS"];
                        $premio["primerS"] = $array["idPincho"];
                    } elseif ($array["sumS"] < $valorPremio["primerS"] && $array["sumS"] > $valorPremio["segundoS"]) {
                        $valorPremio["terceroS"] = $valorPremio["segundoS"];
                        $premio["terceroS"] = $premio["segundoS"];
                        $valorPremio["segundoS"] = $array["sumS"];
                        $premio["segundoS"] = $array["idPincho"];
                    } elseif ($array["sumS"] < $valorPremio["segundoS"] && $array["sumS"] > $valorPremio["terceroS"]) {
                        $valorPremio["terceroS"] = $array["sumS"];
                        $premio["terceroS"] = $array["idPincho"];
                    }

                    //Textura
                    if ($array["sumT"] > $valorPremio["primerT"]) {
                        $valorPremio["terceroT"] = $valorPremio["segundoT"];
                        $premio["terceroT"] = $premio["segundoT"];
                        $valorPremio["segundoT"] = $valorPremio["primerT"];
                        $premio["segundoT"] = $premio["primerT"];
                        $valorPremio["primerT"] = $array["sumT"];
                        $premio["primerT"] = $array["idPincho"];
                    } elseif ($array["sumT"] < $valorPremio["primerT"] && $array["sumT"] > $valorPremio["segundoT"]) {
                        $valorPremio["terceroT"] = $valorPremio["segundoT"];
                        $premio["terceroT"] = $premio["segundoT"];
                        $valorPremio["segundoT"] = $array["sumT"];
                        $premio["segundoT"] = $array["idPincho"];
                    } elseif ($array["sumT"] < $valorPremio["segundoT"] && $array["sumT"] > $valorPremio["terceroT"]) {
                        $valorPremio["terceroT"] = $array["sumT"];
                        $premio["terceroT"] = $array["idPincho"];
                    }

                    //Originalidad
                    if ($array["sumO"] > $valorPremio["primerO"]) {
                        $valorPremio["terceroO"] = $valorPremio["segundoO"];
                        $premio["terceroO"] = $premio["segundoO"];
                        $valorPremio["segundoO"] = $valorPremio["primerO"];
                        $premio["segundoO"] = $premio["primerO"];
                        $valorPremio["primerO"] = $array["sumO"];
                        $premio["primerO"] = $array["idPincho"];
                    } elseif ($array["sumO"] < $valorPremio["primerO"] && $array["sumO"] > $valorPremio["segundoO"]) {
                        $valorPremio["terceroO"] = $valorPremio["segundoO"];
                        $premio["terceroO"] = $premio["segundoO"];
                        $valorPremio["segundoO"] = $array["sumO"];
                        $premio["segundoO"] = $array["idPincho"];
                    } elseif ($array["sumO"] < $valorPremio["segundoO"] && $array["sumO"] > $valorPremio["terceroO"]) {
                        $valorPremio["terceroO"] = $array["sumO"];
                        $premio["terceroO"] = $array["idPincho"];
                    }
                }

                /*echo "<br>Primero presentacion: " . $premio["primerP"];
                echo "<br>Segundo presentacion: " . $premio["segundoP"];
                echo "<br>Tercero presentacion: " . $premio["terceroP"];
                echo "<br>-----------------------------<br>";
                echo "<br>Primero sabor: " . $premio["primerS"];
                echo "<br>Segundo sabor: " . $premio["segundoS"];
                echo "<br>Tercero sabor: " . $premio["terceroS"];
                echo "<br>-----------------------------<br>";
                echo "<br>Primero textura: " . $premio["primerT"];
                echo "<br>Segundo textura: " . $premio["segundoT"];
                echo "<br>Tercero textura: " . $premio["terceroT"];
                echo "<br>-----------------------------<br>";
                echo "<br>Primero originalidad: " . $premio["primerO"];
                echo "<br>Segundo originalidad: " . $premio["segundoO"];
                echo "<br>Tercero originalidad: " . $premio["terceroO"];
                echo "<br>-----------------------------<br><br>";*/

                if (!$this->premioMapper->existenPremios()) {
                    $premioOBJ = new Premio(null, "Presentacion", "1º premio presentacion", "1º premio a la mejor presentacion del pincho", null);
                    $temp = $premio["primerP"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Presentacion", "2º premio presentacion", "2º premio a la segunda mejor presentacion del pincho", null);
                    $temp = $premio["segundoP"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Presentacion", "3º premio presentacion", "3º premio a la tercer mejor presentacion del pincho", null);
                    $temp = $premio["terceroP"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Sabor", "1º premio sabor", "1º premio al pincho con mejor sabor", null);
                    $temp = $premio["primerS"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Sabor", "2º premio sabor", "2º premio al pincho con el segundo mejor sabor", null);
                    $temp = $premio["segundoS"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Sabor", "3º premio sabor", "3º premio al pincho con el tercer mejor sabor", null);
                    $temp = $premio["terceroS"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Textura", "1º premio textura", "1º premio a la mejor textura del pincho", null);
                    $temp = $premio["primerT"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Textura", "2º premio textura", "2º premio a la segunda mejor textura del pincho", null);
                    $temp = $premio["segundoT"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Textura", "3º premio textura", "3º premio a la tercer mejor textura del pincho", null);
                    $temp = $premio["terceroT"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Originalidad", "1º premio original", "1º premio al pincho más original", null);
                    $temp = $premio["primerO"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Originalidad", "2º premio original", "2º premio al segundo pincho más original", null);
                    $temp = $premio["segundoO"];
                    $this->premioMapper->insertar($premioOBJ, $temp);

                    $premioOBJ = new Premio(null, "Originalidad", "3º premio original", "3º premio al tercer pincho más original", null);
                    $temp = $premio["terceroO"];
                    $this->premioMapper->insertar($premioOBJ, $temp);
                }
                $this->calcularPremioJP();
            }
            $this->view->redirect("premio", "index#seccionPre");
        } else {
            echo "Upss! no deberías estar aquí";
            echo "<br>Redireccionando...";
            header("Refresh: 5; index.php?controller=pincho&action=index");
        }
    }

    public function calcularPremioJP()
    {

        $jurados=$this->premioMapper->contarVotos();
        $i=0;
        if(isset($jurados)) {
           foreach ($jurados as $jp) {
                if($i==0) {
                    $premioOBJ = new Premio(null, "Popular", "1º Premio", "1º premio por mayor numero de votos", $jp["dniJP"]);
                    $this->premioMapper->insertarPopular($premioOBJ);
                }
                elseif($i==1) {
                    $premioOBJ = new Premio(null, "Popular", "2º Premio", "2º premio por mayor numero de votos", $jp["dniJP"]);
                    $this->premioMapper->insertarPopular($premioOBJ);
                }
                else{
                    $premioOBJ = new Premio(null, "Popular", "3º Premio", "3º premio por mayor numero de votos", $jp["dniJP"]);
                    $this->premioMapper->insertarPopular($premioOBJ);
                }
                $i++;
            }
        }
    }
}
