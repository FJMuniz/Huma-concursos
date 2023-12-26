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


/**
 * este archivo va a buscar un concurso a la base de datos y manda al front la estructura entera
 * 
 * deberia recibir tres parametros, dos fechas y un tipo de fecha (desde hasta cuando)
 * 
 * quizas podriamos armar x cantidad de parametros opcionales, que refinan aun mas la busqueda (si esta sustanciado, si tiene tal id de asignatura, etc.)
 * 
 * deberia devolver un array de objetos concurso con una cantidad reducida de datos para que se grafiquen en una tabla de resultados en el front
 * 
 * algo asi como ORDEN DE PRELACION | AREA  | DEPARTAMENTO | alguna fecha?
 * 
 * tambien podria mandar al front un INT que indique la cantidad de resultados obtenidos, para que en el front diga algo asi como 'se concontraron N resultados:'
 
 */
