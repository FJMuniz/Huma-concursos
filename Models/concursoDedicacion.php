<?php

namespace Models;

use JsonSerializable;

class ConcursoDedicacion implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                             private $id;
    /** @var string */                          private $dedicacion;
    /** @var int|null */                        private $idSubdedicacion;

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
     * @param string $dedicacion
     */
    public function setDedicacion($dedicacion)
    {
        $this->dedicacion = $dedicacion;
    }

    /**
     * @return string
     */
    public function getDedicacion()
    {
        return $this->dedicacion;
    }


    /**
     * @param int|null $idSubdedicacion
     */
    public function setIdSubdedicacion($idSubdedicacion)
    {
        $this->idSubdedicacion = $idSubdedicacion;
    }

    /**
     * @return int|null $idSubdedicacion
     */
    public function getIdSubdedicacion()
    {
        return $this->idSubdedicacion;
    }
}
