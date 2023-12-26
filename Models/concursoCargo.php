<?php

namespace Models;

use JsonSerializable;

class ConcursoCargo implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var string */                    private $cargo;



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
     * @param string
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }
}
