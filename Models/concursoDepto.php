<?php

namespace Models;

use JsonSerializable;

class ConcursoDepto implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var string */                    private $depto;

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
     * @param string $depto
     */
    public function setDepto($depto)
    {
        $this->depto = $depto;
    }

    /**
     * @return string
     */
    public function getDepto()
    {
        return $this->depto;
    }
}
