<?php

namespace Models;

use JsonSerializable;

class ConcursoMain implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var datetime */                  private $fechaPublicacion;
    /** @var datetime */                  private $fechaCierre;
    /** @var datetime */                  private $fechaDesignacion;
    /** @var datetime */                  private $fechaPaseArchivo;
    /** @var datetime */                  private $fechaSustancia;

    /** @var ConcursoDepto */             private $depto;
    /** @var ConcursoDedicacion */        private $dedicacion;
    /** @var ConcursoArea */              private $area;
    /** @var ConcursoConvenio */          private $convenio;
    /** @var ConcursoCargo */             private $cargo;
    /** @var int */                       private $cantidadCargos;
    /** @var string */                    private $oca;
    /** @var string */                    private $nup;

    /** @var string */                    private $expedienteLlamado;
    /** @var string */                    private $expedienteConcurso;
    /** @var string */                    private $recusacion;
    /** @var Int */                       private $investigacion;
    /** @var string */                    private $interino;
    /** @var bool */                      private $sustancia;
    /** @var bool */                      private $disidencia;
    /** @var string */                    private $ocaDesignacion;
    /** @var string */                    private $observacion;
    /** @var int */                       private $ordenPrelacion;
    /** @var ConcursoComision[] */        private $comisiones;
    /** @var ConcursoAsignatura[] */      private $asignaturas;
    /** @var ConcursoPostulante[] */      private $postulantes;
    /** @var ConcursoPresentacion[] */    private $presentaciones;
    /** @var ConcursoDesignado[] */      private $designados;


    public function __construct()
    {
        $this->comisiones = array();
        $this->asignaturas = array();
        $this->postulantes = array();
        $this->presentaciones = array();
        $this->designados = array();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param ConcursoDepto
     */
    public function setDepto($depto)
    {
        $this->depto = $depto;
    }

    /**
     * @return ConcursoDepto
     */
    public function getDepto()
    {
        return $this->depto;
    }



    /**
     * @param ConcursoDedicacion
     */
    public function setDedicacion($dedicacion)
    {
        $this->dedicacion = $dedicacion;
    }

    /**
     * @return ConcursoDedicacion
     */
    public function getDedicacion()
    {
        return $this->dedicacion;
    }

    /**
     * @param ConcursoArea
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return ConcursoArea
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param ConcursoConvenio|null
     */
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;
    }

    /**
     * @return ConcursoConvenio
     */
    public function getConvenio()
    {
        return $this->convenio;
    }

    /**
     * @param ConcursoCargo $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return ConcursoCargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param int $cantidadCargos
     */
    public function setCantidadCargos($cantidadCargos)
    {
        $this->cantidadCargos = $cantidadCargos;
    }

    /**
     * @return int $cantidadCargos
     */
    public function getCantidadCargos()
    {
        return $this->cantidadCargos;
    }

    /**
     * @param string $oca
     */
    public function setOca($oca)
    {
        $this->oca = $oca;
    }

    /**
     * @return string $oca
     */
    public function getOca()
    {
        return $this->oca;
    }

    /**
     * @param string $expedienteLlamado
     */
    public function setExpedienteLlamado($expedienteLlamado)
    {
        $this->expedienteLlamado = $expedienteLlamado;
    }

    /**
     * @return string $expedienteLlamado
     */
    public function getExpedienteLlamado()
    {
        return $this->expedienteLlamado;
    }

    /**
     * @param string $expedienteConcurso
     */
    public function setExpedienteConcurso($expedienteConcurso)
    {
        $this->expedienteConcurso = $expedienteConcurso;
    }

    /**
     * @return string $expedienteConcurso
     */
    public function getExpedienteConcurso()
    {
        return $this->expedienteConcurso;
    }

    /**
     * @param string $expedienteConcurso
     */
    public function setRecusacion($recusacion)
    {
        $this->recusacion = $recusacion;
    }

    /**
     * @return string $recusacion
     */
    public function getRecusacion()
    {
        return $this->recusacion;
    }

    /**
     * @param Int $investigacion
     */
    public function setInvestigacion($investigacion)
    {
        $this->investigacion = $investigacion;
    }

    /**
     * @return Int $investigacion
     */
    public function getInvestigacion()
    {
        return $this->investigacion;
    }

    /**
     * @param string $interino
     */
    public function setInterino($interino)
    {
        $this->interino = $interino;
    }

    /**
     * @return string $interino
     */
    public function getInterino()
    {
        return $this->interino;
    }

    /**
     * @param bool $sustancia
     */
    public function setSustancia($sustancia)
    {
        $this->sustancia = $sustancia;
    }

    /**
     * @return bool $sustancia
     */
    public function getSustancia()
    {
        return $this->sustancia;
    }

    /**
     * @param bool $disidencia
     */
    public function setDisidencia($disidencia)
    {
        $this->disidencia = $disidencia;
    }

    /**
     * @return bool $disidencia
     */
    public function getDisidencia()
    {
        return $this->disidencia;
    }
    /**
     * @param string $ocaDesignacion
     */
    public function setOcaDesignacion($ocaDesignacion)
    {
        $this->ocaDesignacion = $ocaDesignacion;
    }

    /**
     * @return string $ocaDesignacion
     */
    public function getOcaDesignacion()
    {
        return $this->ocaDesignacion;
    }

    /**
     * @param string $observacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    /**
     * @return string $observacion
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param int $ordenPrelacion
     */
    public function setOrdenPrelacion($ordenPrelacion)
    {
        $this->ordenPrelacion = $ordenPrelacion;
    }

    /**
     * @return int $ordenPrelacion
     */
    public function getOrdenPrelacion()
    {
        return $this->ordenPrelacion;
    }

    /**
     * @param ConcursoComision $comision
     */
    public function addConcursoComision($comision)
    {
        array_push($this->comisiones, $comision);
    }

    /**
     * @param ConcursoComision[] $comisiones
     */
    public function setConcursoComisiones($comisiones)
    {
        $this->comisiones = $comisiones;
    }

    /**
     * @return ConcursoComision
     */
    public function getConcursoComision()
    {
        return $this->comisiones;
    }

    /**
     * @param ConcursoAsignatura $asignatura
     */
    public function addConcursoAsignatura($asignatura)
    {
        array_push($this->asignaturas, $asignatura);
    }

    /**
     * @param ConcursoAsignatura[] $asignaturas
     */
    public function setConcursoAsignaturas($asignaturas)
    {
        $this->asignaturas = $asignaturas;
    }

    /**
     * @return ConcursoAsignatura
     */
    public function getConcursoAsignatura()
    {
        return $this->asignaturas;
    }

    /**
     * @param ConcursoPostulante $postulante
     */
    public function addConcursoPostulantes($postulante)
    {
        array_push($this->postulantes, $postulante);
    }

    /**
     * @param ConcursoPostulante[] $postulantes
     */
    public function setConcursoPostulante($postulantes)
    {
        $this->postulantes = $postulantes;
    }

    /**
     * @return ConcursoPostulante
     */
    public function getConcursoPostulantes()
    {
        return $this->postulantes;
    }

    /**
     * @param ConcursoPresentacion $presentacion
     */
    public function addConcursoPresentacion($presentacion)
    {
        array_push($this->presentaciones, $presentacion);
    }

    /**
     * @param ConcursoPresentacion[] $presentaciones
     */
    public function setConcursoPresentaciones($presentaciones)
    {
        $this->presentaciones = $presentaciones;
    }

    /**
     * @return ConcursoPresentacion
     */
    public function getConcursoPresentacion()
    {
        return $this->presentaciones;
    }

    /**
     * @param datetime $fechaPublicacion
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    /**
     * @return datetime $fechaPublicacion
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * @param datetime $fechaCierre
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;
    }

    /**
     * @return datetime $fechaCierre
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * @param datetime $fechaDesignacion
     */
    public function setFechaDesignacion($fechaDesignacion)
    {
        $this->fechaDesignacion = $fechaDesignacion;
    }

    /**
     * @return datetime $fechaDesignacion
     */
    public function getFechaDesignacion()
    {
        return $this->fechaDesignacion;
    }

    /**
     * @param datetime $fechaPaseArchivo
     */
    public function setFechaPaseArchivo($fechaPaseArchivo)
    {
        $this->fechaPaseArchivo = $fechaPaseArchivo;
    }

    /**
     * @return datetime $fechaPaseArchivo
     */
    public function getFechaPaseArchivo()
    {
        return $this->fechaPaseArchivo;
    }

    /**
     * @param string $nup
     */
    public function setNup($nup)
    {
        $this->nup = $nup;
    }

    /**
     * @return string $nup
     */
    public function getNup()
    {
        return $this->nup;
    }

    /**
     * @return datetime $fechaSustancia
     */
    public function getFechaSustanciado()
    {
        return $this->fechaSustancia;
    }

    /**
     * @param datetime|null $fechaSustancia
     */
    public function setFechaSustanciado($fechaSustancia)
    {
        $this->fechaSustancia = $fechaSustancia;
    }



    /**
     * @param ConcursoDesignado $designado
     */
    public function addConcursoDesignados($designado)
    {
        array_push($this->designados, $designado);
    }

    /**
     * @param ConcursoDesignado[] $designados
     */
    public function setConcursoDesignado($designados)
    {
        $this->designados = $designados;
    }

    /**
     * @return ConcursoDesignado
     */
    public function getConcursoDesignado()
    {
        return $this->designados;
    }
}
