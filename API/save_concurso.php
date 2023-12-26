<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

use Config\Autoload;

require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Config.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Autoload.php";

Autoload::Start();

use Controllers\concursoController;

$concursoController = new concursoController();

use \Models\ConcursoMain as ConcursoMain;
use \Models\ConcursoArea as ConcursoArea;
use \Models\ConcursoAsignatura as ConcursoAsignatura;
use \Models\ConcursoCargo as ConcursoCargo;
use \Models\ConcursoComision as ConcursoComision;
use \Models\ConcursoConvenio as ConcursoConvenio;
use \Models\ConcursoDedicacion as ConcursoDedicacion;
use \Models\ConcursoDepto as ConcursoDepto;
use \Models\ConcursoPostulante as ConcursoPostulante;
use \Models\ConcursoPresentacion as ConcursoPresentacion;


$_POST = json_decode(file_get_contents('php://input'), true);
// var_dump($_POST);

//1. Declaro variables de objeto
$concurso = new ConcursoMain();
$area = new ConcursoArea();
$asignatura = new ConcursoAsignatura();
$cargo = new ConcursoCargo();
$comision = new ConcursoComision();
$convenio = new ConcursoConvenio();
$dedicacion = new ConcursoDedicacion();
$depto = new ConcursoDepto();
$posulante = new ConcursoPostulante();
$presentacion = new ConcursoPresentacion();

//2. Relleno el esqueleto de ConcursoMain

//quizas sea mejor buscar otra alternativa a tokenizar. por el momento funciona
$concurso->setFechaPublicacion(strtok($_POST['fechaPublicacion'], "T"));
$concurso->setFechaCierre(strtok($_POST['fechaCierre'], "T"));
$concurso->setFechaDesignacion(strtok($_POST['fechaDesignacion'], "T"));
$concurso->setFechaPaseArchivo(strtok($_POST['fechaPaseArchivo'], "T"));

$concurso->setCantidadCargos($_POST['cantidadCargos']);
$concurso->setOca($_POST['oca']);
$concurso->setExpedienteLlamado($_POST['expedienteLlamado']);
$concurso->setExpedienteConcurso($_POST['expedienteConcurso']);
$concurso->setRecusacion($_POST['recusaciones']);
$concurso->setInterino($_POST['interino']);
$concurso->setSustancia($_POST['sustanciado']);
$concurso->setDisidencia($_POST['disidencia']);

if (!empty($_POST['sustanciado']))
    $concurso->setFechaSustanciado(strtok($_POST['fechaSustanciado']), "T");

$concurso->setOcaDesignacion($_POST['ocaDesignacion']);
$concurso->setObservacion($_POST['observaciones']);
$concurso->setOrdenPrelacion($_POST['ordenPrelacion']);
$concurso->setDisidencia($_POST['disidencia']);

//3. Relleno los objetos individuales: depto, dedicacion, area, convenio y cargo
//agrego esos objetos a la estructura principal

/** DEPTO
 * LLAMAR EN ON INIT select * -> array () return.
 */

if ($_POST['id_departamento'] !== NULL)
    $depto->setId($_POST['id_departamento']);
else
    $depto->setId($concursoController->getDepartamentoID($_POST['departamento']));

// $_POST['departamento'] no existe en el JSON todavia!

$concurso->setDepto($depto->getId());

/** DEDICACION 
 */

$dedicacion->setId($_POST['dedicacion']['id']);
$dedicacion->setIdSubdedicacion($_POST['dedicacion']['tipo']);

$concurso->setDedicacion($dedicacion);

/** AREA
 */

if ($_POST['area']['id'] !== NULL)
    $area->setId($_POST['area']['id']);
else
    $area->setId($concursoController->getAreaID($_POST['area']['string']));

// $_POST['area'] deberia ser un array (id,string). es string

$concurso->setArea($area->getId());

/**CONVENIO
 */

// convenio no esta en el formulario ni en el json

/** CARGO
 */

$cargo->setId($_POST['id_cargo']);
$concurso->setCargo($cargo->getId());

// Guardado del esqueleto principal del formulario
$mainID = $concursoController->getMainID($concurso);

//4.

/** COMISION
 *  el proceso es igual a todos los objetos, recibo un array multidimencional
 *  ese array se recorre con un foreach y se inserta en la variable que contiene al objeto
 *  luego ese objeto Comision se inserta en el objeto Principal
 */

$comisiones = array();
foreach ($_POST["comisionAsesora"] as $key => $data) {
    $miembro = new ConcursoComision();
    $miembro->setIdMain($mainID);
    $miembro->setMiembro($data);
    $miembro->setId($concursoController->getComisionId($miembro));
    array_push($comisiones, $data);
}
$concurso->setConcursoComisiones($comisiones);


/** Asignatura
 */
$asignaturas = array();
foreach ($_POST["asignaturas"] as $key => $data) {
    $asignatura = new ConcursoAsignatura();
    $asignatura->setId($concursoController->getAsignaturaID($data['asignatura']));
    $asignatura->setIdMain($mainID);
    $asignatura->setAsignatura($data['asignatura']);
    array_push($asignaturas, $asignatura);
}
$concurso->setConcursoAsignaturas($asignaturas);

/** Postulante
 *  posicion podria ser nulo, postulante si o si debe estar. 
 *  el id de asignatura deberia estar, y si no deberia conseguirse antes de insertarlo en la base de datos
 */
$postulantes = array();

/**
 * Designados
 */

//CREAR OBJETO DESIGNADO
//INTEGRARLO AL OBJETO PRINCIPAL

// en el formulario 'designados' tendria que llamarse 'orden de merito' 
// tendria que existir otro apartado que se llame 'designados' y funcione basicamente igual

var_dump($concurso);


return $concurso->getOrdenPrelacion();
