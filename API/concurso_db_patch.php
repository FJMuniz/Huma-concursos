<?php

use Config\Autoload;

require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Config.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Concursos/Config/Autoload.php";

Autoload::Start();

use \Models\ConcursoMain as ConcursoMain;
use \Models\ConcursoArea as ConcursoArea;
use \Models\ConcursoAsignatura as ConcursoAsignatura;
use \Models\ConcursoCargo as ConcursoCargo;
use \Models\ConcursoComision as ConcursoComision;
use \Models\ConcursoConvenio as ConcursoConvenio;
use \Models\ConcursoDedicacion as ConcursoDedicacion;
use \Models\ConcursoDepto as ConcursoDepto;
use \Models\ConcursoPostulante as ConcursoPostulante;

use Controllers\concursoController;

$concursoController = new concursoController();

$dbc = mysqli_connect('localhost', 'root', '', 'huma_concursos');
$query = "SELECT * FROM old_concursos_old";
$result = mysqli_query($dbc, $query);

$oldConcursos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data_array = array();
    $data_array['id'] = $row['id'];
    $data_array['FechaPublicacion'] = $row['FechaPublicacion'];
    $data_array['Departamento'] = $row['Departamento'];
    $data_array['Area'] = $row['Area'];
    $data_array['ExpedienteLlamado'] = $row['ExpedienteLlamado'];
    $data_array['Oca'] = $row['Oca'];
    $data_array['Cargo'] = $row['Cargo'];
    $data_array['convenio'] = $row['convenio'];
    $data_array['Cantidad_cargos'] = $row['Cantidad_cargos'];
    $data_array['Ingestigacion'] = $row['Ingestigacion'];
    $data_array['Dedicacion'] = $row['Dedicacion'];
    $data_array['Asignatura'] = $row['Asignatura'];
    $data_array['OrdenPrelacion'] = $row['OrdenPrelacion'];
    $data_array['NUP'] = $row['NUP'];
    $data_array['FechadeCierre'] = $row['FechadeCierre'];
    $data_array['Recusaciones'] = $row['Recusaciones'];
    $data_array['ExpedienteConcurso'] = $row['ExpedienteConcurso'];
    $data_array['Interino'] = $row['Interino'];
    $data_array['Postulantes'] = $row['Postulantes'];
    $data_array['Seleccionados'] = $row['Seleccionados'];
    $data_array['Sustanciado'] = $row['Sustanciado'];
    $data_array['FechaSustanciado'] = $row['FechaSustanciado'];
    $data_array['ComisionAsesora'] = $row['ComisionAsesora'];
    $data_array['Presentaciones'] = $row['Presentaciones'];
    $data_array['OCADesignacion'] = $row['OCADesignacion'];
    $data_array['FechaDesignacion'] = $row['FechaDesignacion'];
    $data_array['Observaciones'] = $row['Observaciones'];
    $data_array['FechaPaseArchivo'] = $row['FechaPaseArchivo'];

    array_push($oldConcursos, $data_array);
}

foreach ($oldConcursos as $key => $concurso) {

    //carga en base de datos de los valores que van en tablas separadas
    //departamento, area, convenio, cargo, dedicacion 

    $idDepartamento = $concursoController->getDepartamentoID($concurso['Departamento']);
    $idArea = $concursoController->getAreaID($concurso['Area']);
    $idConvenio = $concursoController->getConvenioID($concurso['convenio']);
    $idCargo = $concursoController->getCargoID($concurso['Cargo']);
    $idDedicacion = $concursoController->getDedicacionID($concurso['Dedicacion']);

    //carga del esqueleto de concursos
    $concursoSkeleton = new ConcursoMain();

    //2.2.1 esqueleto de todos los datos no relacionados

    //fecha publicacion / fecha designacion / fecha cierre / fecha pase archivo
    //cantidad cargos / oca / expediente llamado / expediente concurso / Recusaciones / nup
    // investigacion / interino / sustancia / disidencia / oca designacion / observaciones / orden prelacion

    if ($concurso['FechaPublicacion'] = "0000-00-00")
        $concurso['FechaPublicacion'] = "2001-09-11";
    $concursoSkeleton->setFechaPublicacion($concurso['FechaPublicacion']);

    if ($concurso['FechaDesignacion'] = "0000-00-00")
        $concurso['FechaDesignacion'] = "2001-09-11";
    $concursoSkeleton->setFechaDesignacion($concurso['FechaDesignacion']);

    if ($concurso['FechadeCierre'] = "0000-00-00")
        $concurso['FechadeCierre'] = "2001-09-11";
    $concursoSkeleton->setFechaCierre($concurso['FechadeCierre']);

    if ($concurso['FechaPaseArchivo'] = "0000-00-00")
        $concurso['FechaPaseArchivo'] = "2001-09-11";
    $concursoSkeleton->setFechaPaseArchivo($concurso['FechaPaseArchivo']);

    if ($concurso['FechaPaseArchivo'] = "0000-00-00")
        $concurso['FechaPaseArchivo'] = "2001-09-11";
    $concursoSkeleton->setFechaSustanciado($concurso['FechaPaseArchivo']);


    $concursoSkeleton->setCantidadCargos($concurso['Cantidad_cargos']);
    $concursoSkeleton->setOca($concurso['Oca']);
    $concursoSkeleton->setExpedienteLlamado($concurso['ExpedienteLlamado']);
    $concursoSkeleton->setExpedienteConcurso($concurso['ExpedienteConcurso']);
    $concursoSkeleton->setRecusacion($concurso['Recusaciones']);

    //HARDCODEAR INVESTIGACION POR EL TRIPLE RADIAL NUEVO 
    $concursoSkeleton->setInvestigacion(0);

    $concursoSkeleton->setInterino($concurso['Interino']);

    if ($concurso['Sustanciado'] == "NO")
        $concurso['Sustanciado'] = false;
    else
        $concurso['Sustanciado'] = true;


    $concursoSkeleton->setSustancia($concurso['Sustanciado']);

    //HARDCODEAR DISIDENCIA
    $concursoSkeleton->setDisidencia(false);

    $concursoSkeleton->setOcaDesignacion($concurso['OCADesignacion']);
    $concursoSkeleton->setObservacion($concurso['Observaciones']);
    $concursoSkeleton->setOrdenPrelacion($concurso['OrdenPrelacion']);
    $concursoSkeleton->setNup($concurso['NUP']);

    //2.2.2 insertar objetos unicos dentro del principal. no hace falta (en esta instancia) setear el valor 

    //departamento
    $concursoDepartamento = new ConcursoDepto();
    $concursoDepartamento->setId($idDepartamento);
    $concursoSkeleton->setDepto($concursoDepartamento);

    //area
    $concursoArea = new ConcursoArea();
    $concursoArea->setId($idArea);
    $concursoSkeleton->setArea($concursoArea);

    //convenio
    $concursoConvenio = new ConcursoConvenio();
    $concursoConvenio->setId($idConvenio);
    $concursoSkeleton->setConvenio($concursoConvenio);

    //cargo
    $concursoCargo = new ConcursoCargo();
    $concursoCargo->setId($idCargo);
    $concursoSkeleton->setCargo($concursoCargo);

    //dedicacion
    $concursoDedicacion = new ConcursoDedicacion();
    $concursoDedicacion->setId($idDedicacion);
    $concursoSkeleton->setDedicacion($concursoDedicacion);

    //2.2.3 envio del esqueleto a base de datos y captura del id principal
    $mainID = $concursoController->getMainID($concursoSkeleton);
    $concursoSkeleton->setId($mainID);

    //2.3 
    //carga de las tablas con multiples relaciones (que necesitan del id principal de concurso)

    //Asignatura
    $asignatura = substr($concurso['Asignatura'], 0, strpos($concurso['Asignatura'], ","));

    $idAsignatura = $concursoController->getAsignaturaID($asignatura);

    $concursoAsignatura = new ConcursoAsignatura();

    $concursoAsignatura->setId($idAsignatura);
    $concursoAsignatura->setIdMain($mainID);

    if (preg_match("/extensión|extension/", $concurso['Asignatura'])) {
        $concursoAsignatura->setExtension(true);
    } else
        $concursoAsignatura->setExtension(false);

    $concursoController->linkAsignatura($concursoAsignatura);

    // Postulantes
    $postulantesArray = preg_split("/\r\n|\r|\n/", $concurso['Postulantes']);
    $postulantesId = array();
    foreach ($postulantesArray as $key => $postulante) {

        $concursoPostulante = new ConcursoPostulante();
        $concursoPostulante->setIdMain($mainID);
        $concursoPostulante->setIdAsignatura($idAsignatura);
        if ($postulante != "") {
            $concursoPostulante->setPostulante($postulante);
            $concursoController->linkPostulante($concursoPostulante);
            $id = $concursoController->getPostulanteId($mainID, $postulante);
            if ($id != null) {
                array_push($postulantesId, $id);
            }
        }
    }

    // Comision
    $comisionArray = preg_split("/\r\n|\r|\n/", $concurso['ComisionAsesora']);
    $comisionId = array();
    foreach ($comisionArray as $key => $comision) {
        $concursoComision = new ConcursoComision();

        $concursoComision->setIdMain($mainID);
        if ($comision != "") {
            $concursoComision->setMiembro($comision);
            $id = $concursoController->getComisionId($concursoComision);
            if ($id != null)
                array_push($comisionId, $id);
        }
    }

    //Designados
    $designadosArray = preg_split("/\r\n|\r|\n/", $concurso['Seleccionados']);

    $posicion = 0;
    foreach ($designadosArray as $key => $designado) {
        if ($designado != "") {
            $posicion++;
            $id = $concursoController->getPostulanteId($mainID, $designado);
            $concursoDesignado = new ConcursoPostulante();
            $concursoDesignado->setPosicion($posicion);
            $concursoDesignado->setIdMain($mainID);
            $concursoDesignado->setId($id);
            if ($concursoDesignado->getId() != null) {
                $concursoController->linkDesignado($concursoDesignado);
            }
        }
    }

    // ORDER LINK   
    foreach ($postulantesId as $key => $postulante) {
        $merito = 0;
        foreach ($comisionId as $key => $comision) {
            $merito++;
            $concursoController->saveOrderLink($mainID, $postulante, $comision, $merito);
        }
    }
}
echo ("Listo! :)");

    /*  PARA LIMPIAR LAS TABLAS 

        TRUNCATE TABLE concursos_area;  
        TRUNCATE TABLE concursos_asignatura;  
        TRUNCATE TABLE concursos_asignatura_link;  
        TRUNCATE TABLE concursos_cargo;  
        TRUNCATE TABLE concursos_comision;  
        TRUNCATE TABLE concursos_convenio;
        TRUNCATE TABLE concursos_dedicacion;  
        TRUNCATE TABLE concursos_departamento;  
        TRUNCATE TABLE concursos_designados;  
        TRUNCATE TABLE concursos_main;  
        TRUNCATE TABLE concursos_orden_link;  
        TRUNCATE TABLE concursos_postulantes;  

    */
