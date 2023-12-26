<?php

namespace Models;

use JsonSerializable;

class ConcursoComision implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var int */                       private $idMain;
    /** @var string */                    private $miembro;


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
     * @param string $miembro
     */
    public function setMiembro($miembro)
    {
        $this->miembro = $miembro;
    }

    /**
     * @return string $miembro
     */
    public function getMiembro()
    {
        return $this->miembro;
    }
}
