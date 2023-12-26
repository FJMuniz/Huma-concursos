<?php

namespace DAO;

use \Models\ConcursoMain as ConcursoMain;
use \Models\ConcursoArea as ConcursoArea;
use \Models\ConcursoAsignatura as ConcursoAsignatura;
use \Models\ConcursoCargo as ConcursoCargo;
use \Models\ConcursoComision as ConcursoComision;
use \Models\ConcursoConvenio as ConcursoConvenio;
use \Models\ConcursoDedicacion as ConcursoDedicacion;
use \Models\ConcursoDepto as ConcursoDepto;
use \Models\ConcursoPostulante as ConcursoPostulante;

class concursoDAO
{
    private $connection;

    private $tableMain = "concursos_main";
    private $tableDepartamento = "concursos_departamento";
    private $tableArea = "concursos_area";
    private $tableConvenio = "concursos_convenio";
    private $tableCargo = "concursos_cargo";
    private $tableDedicacion = "concursos_dedicacion";
    private $tableAsignatura = "concursos_asignatura";
    private $tableAsignaturaLink = "concursos_asignatura_link";
    private $tablePostulante = "concursos_postulantes";
    private $tableComision = "concursos_comision";
    private $tableDesignado = "concursos_designados";
    private $tableOrderLink = "concursos_orden_link";

    /**
     * Busca un departamento en la base de datos y devuelve su ID
     * @param String $departamento
     * @return Int
     */

    public function getDepartamentoId($departamento)
    {
        $query = "SELECT id FROM " . $this->tableDepartamento . " WHERE departamento = :departamento";
        $parameters["departamento"] = $departamento;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta un departamento en la base de datos y devuelve su ID
     * @param String $departamento
     * @return Int
     */

    public function saveDepartamento($departamento)
    {

        $query = "INSERT into " . $this->tableDepartamento . " (departamento) values ('" . $departamento . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }


    /**
     * Busca un area en la base de datos y devuelve su ID
     * @param String $area
     * @return Int
     */

    public function getAreaId($area)
    {
        $query = "SELECT id FROM " . $this->tableArea . " WHERE area = :area";
        $parameters["area"] = $area;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta un area en la base de datos y devuelve su ID
     * @param String $area
     * @return Int
     */

    public function saveArea($area)
    {
        $query = "INSERT into " . $this->tableArea . " (area) values ('" . $area . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }


    /**
     * Busca un convenio en la base de datos y devuelve su ID
     * @param String $convenio
     * @return Int
     */

    public function getConvenioId($convenio)
    {
        $query = "SELECT id FROM " . $this->tableConvenio . " WHERE convenio = :convenio";
        $parameters["convenio"] = $convenio;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta un convenio en la base de datos y devuelve su ID
     * @param String $convenio
     * @return Int
     */

    public function saveConvenio($convenio)
    {

        $query = "INSERT into " . $this->tableConvenio . " (convenio) values ('" . $convenio . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }

    /**
     * Busca un cargo en la base de datos y devuelve su ID
     * @param String $cargo
     * @return Int
     */

    public function getCargoID($cargo)
    {
        $query = "SELECT id FROM " . $this->tableCargo . " WHERE cargo = :cargo";
        $parameters["cargo"] = $cargo;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta un cargo en la base de datos y devuelve su ID
     * @param string $cargo
     * @return int
     */

    public function saveCargo($cargo)
    {

        $query = "INSERT into " . $this->tableCargo . " (cargo) values ('" . $cargo . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }

    /**
     * Busca una dedicacion en la base de datos y devuelve su ID
     * @param string $dedicacion
     * @return int
     */

    public function getDedicacionID($dedicacion)
    {
        $query = "SELECT id FROM " . $this->tableDedicacion . " WHERE dedicacion = :dedicacion";
        $parameters["dedicacion"] = $dedicacion;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta una dedicacion en la base de datos y devuelve su ID
     * @param string $dedicacion
     * @return int
     */

    public function saveDedicacion($dedicacion)
    {

        $query = "INSERT into " . $this->tableDedicacion . " (dedicacion) values ('" . $dedicacion . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }

    /**
     * Busca una asignatura en la base de datos y devuelve su ID
     * @param string $asignatura
     * @return int
     */

    public function getAsignaturaID($asignatura)
    {
        $query = "SELECT id FROM " . $this->tableAsignatura . " WHERE asignatura = :asignatura";
        $parameters["asignatura"] = $asignatura;
        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Inserta una asignatura en la base de datos y devuelve su ID
     * @param String $asignatura
     * @return Int
     */

    public function saveAsignatura($asignatura)
    {
        $query = "INSERT into " . $this->tableAsignatura . " (asignatura) values ('" . $asignatura . "')";
        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query);
    }


    /**
     * Vincula una asignatura a un concurso
     * @param ConcursoAsignatura $concursoAsignatura.
     * @return null
     */
    public function linkAsignatura($concursoAsignatura)
    {
        $query = "INSERT into " . $this->tableAsignaturaLink . " (id_asignatura, id_concurso, extension) values (:id_asignatura, :id_concurso, :extension)";
        $parameters["id_asignatura"] = $concursoAsignatura->getId();
        $parameters["id_concurso"] = $concursoAsignatura->getIdMain();
        $parameters["extension"] = $concursoAsignatura->getExtension();

        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteInsertQuery($query, $parameters);
    }


    /**
     * Vincula un postulante a un concurso 
     * @param ConcursoPostulante $concursoPostulante.
     * @return null
     */
    public function linkPostulante($concursoPostulante)
    {
        $query = "INSERT into " . $this->tablePostulante . " (orden_merito, id_concurso, postulante) values (:orden_merito, :id_concurso, :postulante)";
        $parameters["orden_merito"] = $concursoPostulante->getPosicion();
        $parameters["id_concurso"] = $concursoPostulante->getIdMain();
        $parameters["postulante"] = $concursoPostulante->getPostulante();

        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query, $parameters);
    }

    /**
     * Busca un postulante en la base de datos y devuelve su id
     * @param Int $idConcurso
     * @param String $postulante
     * @return Int
     */
    public function getPostulanteId($idConcurso, $postulante)
    {
        $query = "SELECT id FROM " . $this->tablePostulante . " WHERE postulante = :postulante AND id_concurso = :id_concurso  ";
        $parameters["postulante"] = $postulante;
        $parameters["id_concurso"] = $idConcurso;

        $this->connection = Connection::GetInstance();
        $return = $this->connection->Execute($query, $parameters);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Vincula un comisionado a un concurso
     * @param ConcursoComision $concursoPostulante.
     * @return Int
     */
    public function getComisionId($concursoComision)
    {
        $query = "INSERT into " . $this->tableComision . " (id_concurso, miembro_jurado) values (:id_concurso, :miembro_jurado)";
        $parameters["id_concurso"] = $concursoComision->getIdMain();
        $parameters["miembro_jurado"] = $concursoComision->getMiembro();

        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteInsertQuery($query, $parameters);

        return $return;
    }

    /**
     * Vincula un postulante designado a un concurso
     * @param ConcursoPostulante $concursoPostulante.
     * @return null
     */
    public function linkDesignado($concursoDesignado)
    {

        $query = "INSERT into " . $this->tableDesignado . " (id_concurso, id_postulante, posicion) values (:id_concurso, :id_postulante, :posicion)";
        $parameters["id_concurso"] = $concursoDesignado->getIdMain();
        $parameters["id_postulante"] = $concursoDesignado->getId();
        $parameters["posicion"] = $concursoDesignado->getPosicion();

        $this->connection = Connection::GetInstance();
        $this->connection->ExecuteInsertQuery($query, $parameters);
    }

    /**
     * Inserta el esqueleto de un concurso en la base de datos y devuelve su ID
     * @param concursoMain $concursoSkeleton
     * @return Int
     */
    public function saveConcursoSkeleton($concursoSkeleton)
    {

        $query = "INSERT into " . $this->tableMain . " (fecha_cierre, fecha_sustanciado, fecha_designacion" .
            ", fecha_pase_archivo, id_departamento, id_area, id_convenio, id_cargo, id_dedicacion, cantidad_cargos, OCA, expediente_llamado" .
            ", expediente_concurso, recusaciones, id_subdedicacion, interino, sustanciado, OCA_designacion, observaciones, orden_prelacion" .
            ", disidencia, NUP) " .
            " values (:fecha_cierre, :fecha_sustanciado, :fecha_designacion, :fecha_pase_archivo" .
            ", :id_departamento, :id_area, :id_convenio, :id_cargo, :id_dedicacion, :cantidad_cargos, :OCA, :expediente_llamado" .
            ", :expediente_concurso, :recusaciones, :id_subdedicacion, :interino, :sustanciado, :OCA_designacion, :observaciones, :orden_prelacion" .
            ", :disidencia, :NUP)";

        $parameters["fecha_cierre"] = $concursoSkeleton->getFechaCierre();
        $parameters["fecha_sustanciado"] = $concursoSkeleton->getFechaSustanciado();
        $parameters["fecha_designacion"] = $concursoSkeleton->getFechaDesignacion();
        $parameters["fecha_pase_archivo"] = $concursoSkeleton->getFechaPaseArchivo();
        $parameters["id_departamento"] = $concursoSkeleton->getDepto();
        $parameters["id_area"] = $concursoSkeleton->getArea();
        $parameters["id_convenio"] = $concursoSkeleton->getConvenio()->getId();
        $parameters["id_cargo"] = $concursoSkeleton->getCargo();
        $parameters["id_dedicacion"] = $concursoSkeleton->getDedicacion()->getId();
        $parameters["cantidad_cargos"] = $concursoSkeleton->getCantidadCargos();
        $parameters["OCA"] = $concursoSkeleton->getOca();
        $parameters["expediente_llamado"] = $concursoSkeleton->getExpedienteLlamado();
        $parameters["expediente_concurso"] = $concursoSkeleton->getExpedienteConcurso();
        $parameters["recusaciones"] = $concursoSkeleton->getRecusacion();
        $parameters["id_subdedicacion"] = $concursoSkeleton->getDedicacion()->getIdSubdedicacion();
        $parameters["interino"] = $concursoSkeleton->getInterino();
        $parameters["sustanciado"] = $concursoSkeleton->getSustancia();
        $parameters["OCA_designacion"] = $concursoSkeleton->getOcaDesignacion();
        $parameters["observaciones"] = $concursoSkeleton->getObservacion();
        $parameters["orden_prelacion"] = $concursoSkeleton->getOrdenPrelacion();
        $parameters["disidencia"] = $concursoSkeleton->getDisidencia();
        $parameters["NUP"] = $concursoSkeleton->getNup();

        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query, $parameters);
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


        $query = "INSERT into " . $this->tableOrderLink . " (id_concurso, id_postulante, id_comision, orden_merito)" .
            " values (:id_concurso, :id_postulante, :id_comision, :orden_merito)";

        $parameters["id_concurso"] = $mainID;
        $parameters["id_postulante"] = $postulante;
        $parameters["id_comision"] = $comision;
        $parameters["orden_merito"] = $merito;

        $this->connection = Connection::GetInstance();

        return $this->connection->ExecuteInsertQuery($query, $parameters);
    }


    /**
     * Busca en la base de datos y devuelve un arreglo de las coincidencias encontradas
     * @param String $tipo
     * @param String $dato
     * @return Array
     */
    public function searchData($tipo, $dato)
    {
        $return = array();

        switch ($tipo) {

            case 'area':

                $query = "SELECT * FROM " . $this->tableArea . " WHERE area LIKE '%" . $dato . "%' ORDER BY area DESC";

                $this->connection = Connection::GetInstance();

                $return = $this->connection->ExecuteOnlyAssociative($query);

                return $return;

                break;

            case 'departamento':

                $query = "SELECT * FROM " . $this->tableDepartamento . " WHERE departamento LIKE '%" . $dato . "%' ORDER BY departamento DESC";

                $this->connection = Connection::GetInstance();

                $return = $this->connection->ExecuteOnlyAssociative($query);

                return $return;

                break;

            case 'asignatura':

                $query = "SELECT * FROM " . $this->tableAsignatura . " WHERE asignatura LIKE '%" . $dato . "%' ORDER BY asignatura DESC";

                $this->connection = Connection::GetInstance();

                $return = $this->connection->ExecuteOnlyAssociative($query);

                return $return;

                break;

            default:

                return $return;
                break;
        }
    }

    /**
     * a partir de un orden de prelacion busca y arma el esqueleto de un concurso
     * @param Int $ordenPrelacion
     * @return ConcursoMain
     */

    public function getConcursoSkeleton($ordenPrelacion)
    {

        $query = "SELECT * FROM " . $this->tableMain . " WHERE orden_prelacion = " . $ordenPrelacion . "";

        $this->connection = Connection::GetInstance();

        $data = $this->connection->ExecuteOnlyAssociative($query);

        $concursoSkeleton = new ConcursoMain;
        $concursoDepto = new ConcursoDepto;
        $concursoArea = new ConcursoArea;
        $concursoConvenio = new ConcursoConvenio;
        $concursoCargo = new ConcursoCargo;
        $concursoDedicacion = new ConcursoDedicacion;

        $concursoSkeleton->setDepto($concursoDepto);
        $concursoSkeleton->setArea($concursoArea);
        $concursoSkeleton->setConvenio($concursoConvenio);
        $concursoSkeleton->setCargo($concursoCargo);
        $concursoSkeleton->setDedicacion($concursoDedicacion);

        $concursoSkeleton->setId($data[0]['id']);
        $concursoSkeleton->setFechaCierre($data[0]["fecha_cierre"]);
        $concursoSkeleton->setFechaDesignacion($data[0]["fecha_designacion"]);
        $concursoSkeleton->setFechaSustanciado($data[0]["fecha_sustanciado"]);
        $concursoSkeleton->setFechaPaseArchivo($data[0]["fecha_pase_archivo"]);
        $concursoSkeleton->getDepto()->setId($data[0]["id_departamento"]);
        $concursoSkeleton->getArea()->setId($data[0]["id_area"]);
        $concursoSkeleton->getConvenio()->setId($data[0]["id_convenio"]);
        $concursoSkeleton->getCargo()->setId($data[0]["id_cargo"]);
        $concursoSkeleton->getDedicacion()->setId($data[0]["id_dedicacion"]);
        $concursoSkeleton->setCantidadCargos($data[0]["cantidad_cargos"]);
        $concursoSkeleton->setOca($data[0]["OCA"]);
        $concursoSkeleton->setExpedienteLlamado($data[0]["expediente_llamado"]);
        $concursoSkeleton->setExpedienteConcurso($data[0]["expediente_concurso"]);
        $concursoSkeleton->setRecusacion($data[0]["recusaciones"]);
        $concursoSkeleton->getDedicacion()->setIdSubdedicacion($data[0]["id_subdedicacion"]);
        $concursoSkeleton->setInterino($data[0]["interino"]);
        $concursoSkeleton->setSustancia($data[0]["sustanciado"]);
        $concursoSkeleton->setOcaDesignacion($data[0]["OCA_designacion"]);
        $concursoSkeleton->setObservacion($data[0]["observaciones"]);
        $concursoSkeleton->setOrdenPrelacion($ordenPrelacion);
        $concursoSkeleton->setDisidencia($data[0]["disidencia"]);
        $concursoSkeleton->setNup($data[0]["NUP"]);

        //var_dump($concursoSkeleton);
        return $concursoSkeleton;
    }

    /**
     * A partir de un id devuelve un departamento
     * @param Int $id
     * @return String|null
     */
    public function getDepartamento($id)
    {
        $query = "SELECT departamento FROM " . $this->tableDepartamento . " WHERE id = " . $id . "";

        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['departamento'];

        return $return;
    }


    /**
     * A partir de un id devuelve un area
     * @param Int $id
     * @return String|null
     */
    public function getArea($id)
    {
        $query = "SELECT area FROM " . $this->tableArea . " WHERE id = " . $id . "";

        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['area'];

        return $return;
    }

    /**
     * A partir de un id devuelve un convenio
     * @param Int $id
     * @return String|null
     */
    public function getConvenio($id)
    {
        $query = "SELECT convenio FROM " . $this->tableConvenio . " WHERE id = " . $id . "";

        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['convenio'];

        return $return;
    }

    /**
     * A partir de un id devuelve un cargo
     * @param Int $id
     * @return String|null
     */
    public function getCargo($id)
    {
        $query = "SELECT cargo FROM " . $this->tableCargo . " WHERE id = " . $id . "";

        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['cargo'];

        return $return;
    }

    /**
     * a partir de un id de concurso devuelve todas las comisiones que a ese concurso pertenezcan
     * @param Int $id
     * @return ConcursoComision[]
     */
    public function getConcursoComisiones($id)
    {

        $query = "SELECT * FROM " . $this->tableComision . " WHERE id_concurso = " . $id . "";
        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteOnlyAssociative($query);
        return $return;
    }

    /**
     * a partir de un id de concurso devuelve todas las asignaturas que a ese concurso pertenezcan
     * @param Int $id
     * @return ConcursoAsignatura[]
     */
    public function getConcursoAsignaturas($id)
    {
        $query = "SELECT * FROM " . $this->tableAsignaturaLink . " WHERE id_concurso = " . $id . "";
        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteOnlyAssociative($query);
        return $return;
    }

    /**
     * a partir de un id de concurso devuelve todos los postulantes que a ese concurso pertenezcan
     * @param Int $id
     * @return ConcursoPostulantes[]
     */
    public function getConcursoPostulantes($id)
    {
        $query = "SELECT * FROM " . $this->tablePostulante . " WHERE id_concurso = " . $id . "";
        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteOnlyAssociative($query);
        return $return;
    }

    /**
     * a partir de un id de concurso devuelve todos los designados que a ese concurso pertenezcan
     * @param Int $id
     * @return ConcursoDesignados[]
     */
    public function getConcursoDesignados($id)
    {
        $query = "SELECT * FROM " . $this->tableDesignado . " WHERE id_concurso = " . $id . "";
        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteOnlyAssociative($query);
        return $return;
    }

    /**
     * a partir de un id de asignatura devuelve el nombre de esa asignatura
     * @param Int $idAsignatura
     * @return String
     */
    public function getAsignatura($idAsignatura)
    {
        $query = "SELECT asignatura FROM " . $this->tableAsignatura . " WHERE id = " . $idAsignatura . "";
        $this->connection = Connection::GetInstance();
        $return = $this->connection->ExecuteOnlyAssociative($query);
        return $return[0]['asignatura'];
    }


    /**
     * actualiza la estructura principal de un concurso en la base de datos
     * @param ConcursoMain $concurso
     * @return null
     */
    public function updateSkeleton($concurso)
    {

        $query = "UPDATE " . $this->tableMain . " 
        SET " .
            " fecha_cierre = " . $concurso->getFechaCierre() . ", " .
            " fecha_sustanciado = " . $concurso->getFechaSustanciado() . ", " .
            " fecha_designacion = " . $concurso->getFechaDesignacion() . ", " .
            " fecha_pase_archivo = " . $concurso->getFechaPaseArchivo() . ", " .
            " id_departamento = " . $concurso->getDepto() . ", " .
            " id_area = " . $concurso->getArea() . ", " .
            " id_convenio = " . $concurso->getConvenio()->getId() . ", " .
            " id_cargo = " . $concurso->getCargo() . ", " .
            " id_dedicacion = " . $concurso->getDedicacion()->getId() . ", " .
            " id_subdedicacion = " . $concurso->getDedicacion()->getIdSubdedicacion() . ", " .
            " cantidad_cargos = " . $concurso->getCantidadCargos() . ", " .
            " OCA = " . $concurso->getOca() . ", " .
            " expediente_llamado = " . $concurso->getExpedienteLlamado() . ", " .
            " expediente_concurso = " . $concurso->getExpedienteConcurso() . ", " .
            " recusaciones = " . $concurso->getRecusacion() . ", " .
            " interino = " . $concurso->getInterino() . ", " .
            " sustanciado = " . $concurso->getSustancia() . ", " .
            " OCA_designacion = " . $concurso->getOcaDesignacion() . ", " .
            " observaciones = " . $concurso->getObservacion() . ", " .
            " orden_prelacion = " . $concurso->getOrdenPrelacion() . ", " .
            " disidencia = " . $concurso->getDisidencia() . ", " .
            " NUP = " . $concurso->getNup() . "" .
            " WHERE id = " . $concurso->getID() . "";

        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * actualiza un miembro de una comision de un concurso en la base de datos
     * @param ConcursoComision $miembro
     * @return null
     */
    public function updateComision($miembro)
    {
        $query = "UPDATE " . $this->tableComision . "
        SET " .
            " miembro_jurado = " . $miembro->getMiembro() . "" .
            " WHERE id = " . $miembro->getId() . " ";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * actualiza el vinculo de una asignatura a un concurso en la base de datos
     * @param ConcursoAsignatura $asignatura
     * @return null
     */
    public function updateAsignaturaLink($asignatura)
    {
        $query = "UPDATE " . $this->tableAsignaturaLink . "
        SET " .
            " id_asignatura = " . $asignatura->getId() . ", " .
            " extension = " . $asignatura->getExtension() . "" .
            " WHERE id_asignatura = " . $asignatura->getID() . " 
            AND id_concurso = " . $asignatura->getIdMain() . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * actualiza un postulante de un concurso en la base de datos
     * @param ConcursoPostulante $postulante
     * @return null
     */
    public function updatePostulante($postulante)
    {
        $query = "UPDATE " . $this->tablePostulante . "
        SET " .
            " postulante = " . $postulante->getPostulante() . ", " .
            " orden_merito = " . $postulante->getPosicion() . ", " .
            " WHERE id = " . $postulante->getId() . " ";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * actualiza a un designado de un concurso en la base de datos
     * @param ConcursoDesignado $designado
     * @return null
     */
    public function updateDesignado($designado)
    {

        $designadoID = $this->getDesignadoId($designado->getDesignado(), $designado->getIdMain());

        $query = "UPDATE " . $this->tableDesignado . "
        SET " .
            " id_postulante = " . $designadoID . ", " .
            " orden_merito = " . $designado->getPosicion() . ", " .
            " WHERE id = " . $designado->getId() . " ";

        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * busca un designado en la tabla de postulantes y devuelve su id
     * @param string $designado
     * @param int $idMain
     * @return int
     */

    public function getDesignadoId($designado, $idMain)
    {
        $query = "SELECT id FROM " . $this->tablePostulante . " WHERE id_concurso = " . $idMain . " AND postulante = '" . $designado .  "'";
        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if (count($return) == 0)
            $return = null;
        else
            $return = $return[0]['id'];

        return $return;
    }

    /**
     * Busca un orden de prelacion en la base de datos, devuelve true si existe
     * @param int $ordenPrelacion
     * @return bool
     */
    public function checkOrdenPrelacion($ordenPrelacion)
    {
        $query = "SELECT IF(orden_prelacion = " . $ordenPrelacion . ",true,false) FROM " . $this->tableMain . " WHERE orden_prelacion = " . $ordenPrelacion . " ";
        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);

        if ($return) {
            return true;
        }
        return false;
    }

    /**
     * a partir de un id de concurso borra la estructura principal de un concurso
     * @param int $id
     * @return null
     */
    public function deleteConcursoMain($id)
    {
        $query = "DELETE FROM " . $this->tableMain . " WHERE id = " . $id . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }


    /**
     * a partir de un id de concurso borra los postulantes de un concurso
     * @param int $id
     * @return null
     */
    public function deleteConcursoPostulantes($id)
    {
        $query = "DELETE FROM " . $this->tablePostulante . " WHERE id = " . $id . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }
    /**
     * a partir de un id de concurso borra los designados de un concurso
     * @param int $id
     * @return null
     */
    public function deleteConcursoDesignados($id)
    {
        $query = "DELETE FROM " . $this->tableDesignado . " WHERE id = " . $id . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }
    /**
     * a partir de un id de concurso borra la comision de un concurso
     * @param int $id
     * @return null
     */
    public function deleteConcursoComision($id)
    {
        $query = "DELETE FROM " . $this->tableComision . " WHERE id = " . $id . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }
    /**
     * a partir de un id de concurso borra el vinculo entre una asignatura y un concurso
     * @param int $id
     * @return null
     */
    public function deleteConcursoAsignaturaLink($id)
    {
        $query = "DELETE FROM " . $this->tableAsignaturaLink . " WHERE id = " . $id . "";
        $this->connection = Connection::GetInstance();
        $this->connection->Execute($query);
    }

    /**
     * a partir de un id de postulante y un id de concurso devuelve un postulante designado
     * @param int $idPostulante
     * @param int $idMain
     * @return string
     */
    public function getDesignadoByIds($idPostulante, $idMain)
    {
        $query = "SELECT postulante FROM " . $this->tablePostulante . " WHERE id = " . $idPostulante . " AND id_concurso = " . $idMain . "";

        $this->connection = Connection::GetInstance();

        $return = $this->connection->Execute($query);
        return $return[0]['postulante'];
    }

    /**
     * Inserta una postulante en la base de datos y devuelve su ID
     * @param string $designado
     * @param int $mainID
     * @param int $posicion
     * @return int
     */

    public function savePostulante($designado, $mainID, $posicion)
    {
        $query = "INSERT into " . $this->tablePostulante . " (id_concurso, postulante, orden_merito) values (:id_concurso, :postulante, :orden_merito)";

        $parameters["id_concurso"] = $mainID;
        $parameters["postulante"] = $designado;
        $parameters["orden_merito"] = $posicion;

        $this->connection = Connection::GetInstance();
        return $this->connection->ExecuteInsertQuery($query, $parameters);
    }
}
