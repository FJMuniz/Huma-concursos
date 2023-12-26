<?php

namespace Models;

use JsonSerializable;

class ConcursoPresentacion implements JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /** @var int */                       private $id;
    /** @var int */                       private $idPostulante;
    /** @var int */                       private $ordenPrelacion;
    /** @var string */                    private $presentacion;


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
     * @param int $idPostulante
     */
    public function setIdPostulante($idPostulante)
    {
        $this->idPostulante = $idPostulante;
    }

    /**
     * @return int $idPostulante
     */
    public function getIdPostulante()
    {
        return $this->idPostulante;
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
     * @param string $presentacion
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;
    }

    /**
     * @return string $presentacion
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }
}
