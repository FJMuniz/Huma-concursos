<?php

namespace Models;

use JsonSerializable;

class ConcursoDesignado implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var int */                       private $idMain;
    /** @var int */                       private $idAsignatura;
    /** @var string */                    private $designado;
    /** @var int */                       private $idPostulante;
    /** @var int */                       private $posicion;


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
     * @param int $idMain
     */
    public function setIdMain($idMain)
    {
        $this->idMain = $idMain;
    }

    /**
     * @return int $idMain
     */
    public function getIdMain()
    {
        return $this->idMain;
    }


    /**
     * @param int $idAsignatura
     */
    public function setIdAsignatura($idAsignatura)
    {
        $this->idAsignatura = $idAsignatura;
    }

    /**
     * @return int $idAsignatura
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }

    /**
     * @param string $designado
     */
    public function setDesignado($designado)
    {
        $this->designado = $designado;
    }

    /**
     * @return string $designado
     */
    public function getDesignado()
    {
        return $this->designado;
    }


    /**
     * @param int $posicion
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }

    /**
     * @return int $posicion
     */
    public function getPosicion()
    {
        return $this->posicion;
    }


    /**
     * @param int $idPostulante
     */
    public function setIdPostulante($idPostulante)
    {
        $this->idPostulante = $idPostulante;
    }

    /**
     * @return int $idPostulante
     */
    public function getIdpostulante()
    {
        return $this->idPostulante;
    }
}
