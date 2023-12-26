<?php

namespace Models;

use JsonSerializable;

class ConcursoConvenio implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var string */                    private $convenio;


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
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;
    }

    /**
     * @return string
     */
    public function getConvenio()
    {
        return $this->convenio;
    }
}
