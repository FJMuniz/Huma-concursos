<?php

namespace Config;

use Config\Chronometer;

require_once("chronometer.php");

setlocale(LC_TIME, 'es_ES', 'esp_esp');

define("ROOT", dirname(__DIR__) . "/");
define("FRONT_ROOT", "/utn/tpfinallab4/");
define("IMAGE_PATH", FRONT_ROOT . "images/");
define("VIEWS_PATH", "views/");
define("CSS_PATH", FRONT_ROOT . VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT . VIEWS_PATH . "js/");

define("DB_HOST", "127.0.0.1");
define("DB_NAME", "huma_concursos");
define("DB_USER", "root");
define("DB_PASS", "");
define("CGI_PATH", "C:/xampp/cgi-bin/");

//FUNCIONES DE MANEJO DE TIEMPO PARA CALCULOS DE PROCESOS
$chronometer = Chronometer::GetInstance();
