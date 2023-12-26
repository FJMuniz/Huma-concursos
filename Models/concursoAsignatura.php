<?php

namespace Models;

use JsonSerializable;

class ConcursoAsignatura implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var int */                       private $idMain;
    /** @var string */                    private $asignatura;
    /** @var bool */                      private $extension;


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
     * @param int $idmain
     */
    public function setIdMain($idmain)
    {
        $this->idMain = $idmain;
    }

    /**
     * @return int $idmain
     */
    public function getIdMain()
    {
        return $this->idMain;
    }

    /**
     * @param bool $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * @return bool $extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param string $asignatura
     */
    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;
    }

    /**
     * @return string $asignatura
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }
}
