<?php

namespace Controllers;

use DAO\ConcursoDAO as concursoDAO;

use \Models\ConcursoMain as ConcursoMain;
use \Models\ConcursoArea as ConcursoArea;
use \Models\ConcursoAsignatura as ConcursoAsignatura;
use \Models\ConcursoCargo as ConcursoCargo;
use \Models\ConcursoComision as ConcursoComision;
use \Models\ConcursoConvenio as ConcursoConvenio;
use \Models\ConcursoDedicacion as ConcursoDedicacion;
use \Models\ConcursoDepto as ConcursoDepto;
use \Models\ConcursoPostulante as ConcursoPostulante;
use \Models\ConcursoDesignado as ConcursoDesignado;

class concursoController
{

    /**
     * busca un departamento en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $departamento
     * @return Int
     */
    public function getDepartamentoID($departamento)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getDepartamentoID($departamento);

        if ($id == null)
            $id =  $concursoDAO->saveDepartamento($departamento);


        return $id;
    }

    /**
     * busca un area en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $area
     * @return Int
     */
    public function getAreaID($area)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getAreaID($area);

        if ($id == null)
            $id =  $concursoDAO->saveArea($area);


        return $id;
    }


    /**
     * busca un convenio en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $convenio
     * @return Int
     */
    public function getConvenioID($convenio)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getConvenioID($convenio);

        if ($id == null)
            $id =  $concursoDAO->saveConvenio($convenio);


        return $id;
    }


    /**
     * busca una dedicacion en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $dedicacion
     * @return Int
     */
    public function getDedicacionID($dedicacion)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getDedicacionID($dedicacion);

        if ($id == null)
            $id =  $concursoDAO->saveDedicacion($dedicacion);


        return $id;
    }


    /**
     * busca un cargo en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $cargo
     * @return Int
     */
    public function getCargoID($cargo)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getCargoID($cargo);

        if ($id == null)
            $id =  $concursoDAO->saveCargo($cargo);


        return $id;
    }

    /**
     * busca una asignatura en la base de datos, si existe, devuelve su id. sino, lo crea 
     * @param String $asignatura
     * @return Int
     */
    public function getAsignaturaID($asignatura)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getAsignaturaID($asignatura);

        if ($id == null)
            $id =  $concursoDAO->saveAsignatura($asignatura);


        return $id;
    }




    /**
     * Inserta el esqueleto de un concurso en la base de datos y devuelve su ID
     * @param concursoMain $concursoSkeleton
     * @return Int
     */
    public function getMainID($concursoSkeleton)
    {
        $concursoDAO = new concursoDAO();
        return $concursoDAO->saveConcursoSkeleton($concursoSkeleton);
    }

    /**
     * Vincula una asignatura a un concurso
     * @param ConcursoAsignatura $concursoAsignatura.
     * @return null
     */
    public function linkAsignatura($concursoAsignatura)
    {
        $concursoDAO = new concursoDAO();
        $concursoDAO->linkAsignatura($concursoAsignatura);
    }


    /**
     * Vincula un postulante a un concurso 
     * @param ConcursoPostulante $concursoPostulante.
     * @return null
     */
    public function linkPostulante($concursoPostulante)
    {
        $concursoDAO = new concursoDAO();
        $concursoDAO->linkPostulante($concursoPostulante);
    }

    /**
     * Vincula un comisionado a un concurso y devuelve su id
     * @param ConcursoComision $concursoComision.
     * @return Int
     */
    public function getComisionId($concursoComision)
    {
        $concursoDAO = new concursoDAO();
        return $concursoDAO->getComisionId($concursoComision);
    }


    /**
     * Busca un postulante en la base de datos y devuelve su id
     * @param Int $idConcurso
     * @param String $postulante
     * @return Int
     */
    public function getPostulanteId($idConcurso, $postulante)
    {
        $concursoDAO = new concursoDAO();

        return $concursoDAO->getPostulanteId($idConcurso, $postulante);
    }



    /**
     * Vincula un postulante designado a un concurso
     * @param ConcursoPostulante $concursoPostulante.
     * @return null
     */
    public function linkDesignado($concursoDesignado)
    {
        $concursoDAO = new concursoDAO();
        $concursoDAO->linkDesignado($concursoDesignado);
    }


    /**
     * Vincula un postulante, un orden de merito y un comisionado a un concurso
     * @param Int $mainID
     * @param Int $postulante
     * @param Int $comision
     * @param Int $merito
     * @return null
     */
    public function saveOrderLink($mainID, $postulante, $comision, $merito)
    {
        $concursoDAO = new concursoDAO();
        $concursoDAO->saveOrderLink($mainID, $postulante, $comision, $merito);
    }


    /**
     * Busca en la base de datos y devuelve un arreglo de las coincidencias encontradas
     * @param String $tipo
     * @param String $dato
     * @return Array
     */
    public function searchData($tipo, $dato)
    {
        $concursoDAO = new concursoDAO();
        return $concursoDAO->searchData($tipo, $dato);
    }


    /**
     * Busca en la base de datos y devuelve un objeto concurso a partir del orden de prelacion dado
     * @param Int $ordenPrelacion
     * @return ConcursoMain
     */

    public function searchConcursoByOrdenPrelacion($ordenPrelacion)
    {
        $concursoDAO = new concursoDAO();
        $skeleton = $concursoDAO->getConcursoSkeleton($ordenPrelacion);

        $skeleton->getDepto()->setDepto($concursoDAO->getDepartamento($skeleton->getDepto()->getId()));

        switch ($skeleton->getDedicacion()->getId()) {
            case 1:
                $skeleton->getDedicacion()->setDedicacion('Exclusiva');
                break;
            case 2:
                $skeleton->getDedicacion()->setDedicacion('Parcial');
                break;
            case 3:
                $skeleton->getDedicacion()->setDedicacion('Simple');
                break;
            case 4:
                $skeleton->getDedicacion()->setDedicacion('');
                break;
            case 5:
                $skeleton->getDedicacion()->setDedicacion('Completa');
                break;
            default:
                $skeleton->getDedicacion()->setDedicacion('');
                break;
        }

        $skeleton->getArea()->setArea($concursoDAO->getArea($skeleton->getArea()->getId()));
        $skeleton->getConvenio()->setConvenio($concursoDAO->getConvenio($skeleton->getConvenio()->getId()));
        $skeleton->getCargo()->setCargo($concursoDAO->getCargo($skeleton->getCargo()->getId()));

        //COMISIONES
        $arrayComisiones = array();
        $comisiones = $concursoDAO->getConcursoComisiones($skeleton->getId());
        foreach ($comisiones as $key => $value) {
            $comision = new ConcursoComision;
            $comision->setIdMain($skeleton->getId());
            $comision->setId($value['id']);
            $comision->setMiembro($value['miembro_jurado']);
            array_push($arrayComisiones, $comision);
        }
        $skeleton->setConcursoComisiones($arrayComisiones);

        //ASIGNATURAS
        $arrayAsignaturas = array();
        $asignaturas = $concursoDAO->getConcursoAsignaturas($skeleton->getId());
        foreach ($asignaturas as $key => $value) {
            $asignatura = new ConcursoAsignatura;
            $asignatura->setIdMain($skeleton->getId());
            $asignatura->setId($value['id_asignatura']);
            $asignatura->setAsignatura($concursoDAO->getAsignatura($value['id_asignatura']));
            $asignatura->setExtension($value['extension']);
            array_push($arrayAsignaturas, $asignatura);
        }
        $skeleton->setConcursoAsignaturas($arrayAsignaturas);

        //POSTULANTES
        $arrayPostulantes = array();
        $postulantes = $concursoDAO->getConcursoPostulantes($skeleton->getId());
        foreach ($postulantes as $key => $value) {
            $postulante = new ConcursoPostulante;
            $postulante->setIdMain($skeleton->getId());
            $postulante->setId($value['id']);
            $postulante->setPostulante($value['postulante']);
            $postulante->setPosicion($value['orden_merito']);
            array_push($arrayPostulantes, $postulante);
        }
        $skeleton->setConcursoPostulante($arrayPostulantes);

        //DESIGNADOS
        $arrayDesignados = array();
        $designados = $concursoDAO->getConcursoDesignados($skeleton->getId());
        foreach ($designados as $key => $value) {
            $designados = new ConcursoDesignado;
            $designados->setIdMain($skeleton->getId());
            $designados->setId($value['id']);
            $designados->setIdPostulante($value['id_postulante']);
            $designados->setPosicion($value['posicion']);
            $designados->setDesignado($concursoDAO->getDesignadoByIds($value['id'], $skeleton->getId()));

            array_push($arrayDesignados, $designados);
        }
        $skeleton->setConcursoDesignado($arrayDesignados);

        return $skeleton;
    }

    /**
     * Construye un objeto concurso a partir de un array asociativo. si tiene id lo envia a editar, sino lo guarda.
     * @param Array $data
     * @return ConcursoMain
     */
    public function buildConcurso($data)
    {

        $concursoDAO = new concursoDAO();
        $editFlag = 0;

        //1. Declaro variables de objeto
        $concurso = new ConcursoMain();
        $area = new ConcursoArea();
        $asignatura = new ConcursoAsignatura();
        $cargo = new ConcursoCargo();
        $convenio = new ConcursoConvenio();
        $dedicacion = new ConcursoDedicacion();
        $depto = new ConcursoDepto();

        //2. Relleno el esqueleto de ConcursoMain
        $concurso->setFechaPublicacion(strtok($data['fechaPublicacion'], "T"));
        $concurso->setFechaCierre(strtok($data['fechaCierre'], "T"));
        $concurso->setFechaDesignacion(strtok($data['fechaDesignacion'], "T"));
        $concurso->setFechaPaseArchivo(strtok($data['fechaPaseArchivo'], "T"));

        $concurso->setCantidadCargos($data['cantidadCargos']);
        $concurso->setOca($data['oca']);
        $concurso->setExpedienteLlamado($data['expedienteLlamado']);
        $concurso->setExpedienteConcurso($data['expedienteConcurso']);
        $concurso->setRecusacion($data['recusacion']);
        $concurso->setInterino($data['interino']);
        $concurso->setSustancia($data['sustanciado']);
        $concurso->setDisidencia($data['disidencia']);
        if ($data['sustanciado'])
            $concurso->setFechaSustanciado(strtok($data['fechaSustanciado']), "T");
        $concurso->setOcaDesignacion($data['ocaDesignacion']);
        $concurso->setObservacion($data['observacion']);
        $concurso->setOrdenPrelacion($data['ordenPrelacion']);
        $concurso->setDisidencia($data['disidencia']);

        //3. Relleno los objetos individuales

        /** DEPARTAMENTO **/

        if ($data['departamento']['id_departamento'] == null) {
            $depto->setId($concursoDAO->getDepartamentoID($data['departamento']['departamento']));
        } else
            $depto->setId($data['departamento']['id_departamento']);

        $concurso->setDepto($depto->getId());

        /** DEDICACION **/
        $dedicacion->setId($data['dedicacion']['id']);
        $dedicacion->setIdSubdedicacion($data['dedicacion']['tipo']);

        $concurso->setDedicacion($dedicacion);

        /** AREA **/
        if ($data['area']['id'] !== NULL)

            $area->setId($data['area']['id']);
        else
            $area->setId($concursoDAO->getAreaID($data['area']['label']));

        $concurso->setArea($area->getId());

        /** CONVENIO **/
        $convenio->setId($data['convenio']['id']);
        $concurso->setConvenio($convenio);

        /** CARGO **/
        $cargo->setId($data['cargo']['id']);
        $concurso->setCargo($cargo->getId());


        if ($data['id'] == null) {
            $mainID = $concursoDAO->saveConcursoSkeleton($concurso);
        } else {
            $editFlag = 1;
            $mainID = $data['id'];
            $concurso->setID($data['id']);
            $concursoDAO->updateSkeleton($concurso);
        }


        //4. Relleno de los objetos multiples

        /** COMISION **/
        $comisiones = array();
        if ($data["comisionAsesora"] != null) {
            foreach ($data["comisionAsesora"] as $key => $value) {
                $miembro = new ConcursoComision();
                $miembro->setIdMain($mainID);
                $miembro->setMiembro($value);
                if ($editFlag) {
                    $miembro->setId($concursoDAO->updateComision($miembro));
                } else
                    $miembro->setId($concursoDAO->getComisionId($miembro));

                array_push($comisiones, $miembro);
            }
        }
        $concurso->setConcursoComisiones($comisiones);

        /** ASIGNATURA **/
        $asignaturas = array();
        foreach ($data["asignaturas"] as $key => $value) {
            $asignatura = new ConcursoAsignatura();
            // $asignatura->setId($concursoDAO->getAsignaturaID($data['asignatura']));
            $asignatura->setId($this->getAsignaturaID($value['asignatura']));
            $asignatura->setIdMain($mainID);
            $asignatura->setAsignatura($value['asignatura']);
            $asignatura->setExtension($value['extension']);

            if ($editFlag) {
                $concursoDAO->updateAsignaturaLink($asignatura);
            } else
                $concursoDAO->linkAsignatura($asignatura);

            array_push($asignaturas, $asignatura);
        }
        $concurso->setConcursoAsignaturas($asignaturas);



        /** POSTULANTE **/

        $postulantes = array();
        foreach ($data["postulantes"] as $key => $value) {

            $postulante = new ConcursoPostulante();

            $postulante->setIdMain($mainID);
            $postulante->setPostulante($value["postulante"]);
            $postulante->setPosicion($value["posicion"]);

            if ($editFlag) {
                $concursoDAO->updatePostulante($postulante);
            } else {
                $concursoDAO->linkPostulante($postulante);
            }
            array_push($postulantes, $postulante);
        }
        $concurso->setConcursoPostulante($postulantes);

        /**  DESIGNADO **/
        $designados = array();
        foreach ($data["designados"] as $key => $value) {
            $designado = new ConcursoDesignado();
            $designado->setIdMain($mainID);
            $designado->setDesignado($value["designado"]);
            $designado->setPosicion($value["posicion"]);
            $designado->setId($this->getDesignadoId($value["designado"], $mainID, $value["posicion"]));

            if ($editFlag) {
                $concursoDAO->updateDesignado($designado);
            } else {
                $concursoDAO->linkDesignado($designado);
            }
            array_push($designados, $designado);
        }
        $concurso->setConcursoDesignado($designados);

        return $concurso;
    }

    /**
     * Busca un designado en la base de postulantes, si no existe, lo crea
     * @param string $designado
     * @param int $mainID
     * @param int $posicion
     * @return int
     */
    public function getDesignadoId($designado, $mainID, $posicion)
    {
        $concursoDAO = new concursoDAO();

        $id = $concursoDAO->getDesignadoId($designado, $mainID);

        if ($id == null)
            $id =  $concursoDAO->savePostulante($designado, $mainID, $posicion);

        return $id;
    }



    /**
     * Busca un orden de prelacion en la base de datos, devuelve true si existe
     * @param int $ordenPrelacion
     * @return bool
     */
    public function checkOrdenPrelacion($ordenPrelacion)
    {
        $concursoDAO = new concursoDAO();
        return $concursoDAO->checkOrdenPrelacion($ordenPrelacion);
    }

    /**
     * A partir de un id borra en todas las tablas un concurso
     * @param int $idMain
     * @return null
     */
    public function deleteConcurso($idMain)
    {
        $concursoDAO = new concursoDAO();
        $concursoDAO->deleteConcursoMain($idMain);
        $concursoDAO->deleteConcursoPostulantes($idMain);
        $concursoDAO->deleteConcursoDesignados($idMain);
        $concursoDAO->deleteConcursoComision($idMain);
        $concursoDAO->deleteConcursoAsignaturaLink($idMain);
    }
}
