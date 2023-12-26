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

$data = $concursoController->searchData($_POST['tipo'], $_POST['dato']);

$arrayKey = array();
$arrayValue = array();
foreach ($data as $key => $value) {
    if (similar_text($value['area'], $_POST['dato']) !== 0) {
        array_push($arrayKey, $key);
        array_push($arrayValue, $value);
    }
}

$return = array_combine($arrayKey, $arrayValue);

echo json_encode(array_slice($return, 0, 5));
