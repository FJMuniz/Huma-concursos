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

$concurso = $concursoController->buildConcurso($_POST);

echo json_encode($concurso->getOrdenPrelacion());
