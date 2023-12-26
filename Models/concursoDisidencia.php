<?php

namespace Models;

use JsonSerializable;

class ConcursoDisidencia implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var int */                       private $ordenPrelacion;
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
