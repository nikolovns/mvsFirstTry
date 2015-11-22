<?php

namespace BindingModels;

class CreateHall {

    private $seating;
    private $venue_id;
    private $hallName;

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
    public function getVenueId()
    {
        return $this->venue_id;
    }

    /**
     * @param mixed $venueId
     */
    public function setVenueId($venue_id)
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





}