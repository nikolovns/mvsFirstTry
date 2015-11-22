<?php

namespace Models;

class HallModel {

    private $id;
    private $seating;
    private $venue_id;
    private $hallName;

    function __construct($seating, $venue_id, $hallName, $id = null)
    {
        $this->id = $id;
        $this->seating = $seating;
        $this->venue_id = $venue_id;
        $this->hallName = $hallName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSeating()
    {
        return $this->seating;
    }

    /**
     * @param mixed $seating
     */
    public function setSeating($seating)
    {
        $this->seating = $seating;
    }

    /**
     * @return mixed
     */
    public function getVenue_Id()
    {
        return $this->venue_id;
    }

    /**
     * @param mixed $venue_id
     */
    public function setVenue_Id($venue_id)
    {
        $this->venue_id = $venue_id;
    }

    /**
     * @return mixed
     */
    public function getHallName()
    {
        return $this->hallName;
    }

    /**
     * @param mixed $hallName
     */
    public function setHallName($hallName)
    {
        $this->hallName = $hallName;
    }

    public function save() {
        return \Repository\Hall::createInstance()->save($this);
    }


}