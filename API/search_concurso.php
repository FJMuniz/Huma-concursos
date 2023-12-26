<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

use Config\Autoload;

require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Config.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Autoload.php";

Autoload::Start();

use Controllers\concursoController;

$concursoController = new concursoController();

$_POST = json_decode(file_get_contents('php://input'), true);

if ($concursoController->checkOrdenPrelacion($_POST['ordenPrelacion']))
    echo json_encode($concursoController->searchConcursoByOrdenPrelacion($_POST['ordenPrelacion']), JSON_PRETTY_PRINT);
die;



//var_dump($concurso);
