<?php

namespace Models;

class ConferenceModel {
    private $confName;
    private $startDate;
    private $endDate;
    private $venue_id;
    private $id;
    private $user_id;

    function __construct($confName, $startDate, $endDate, $venue_id, $user_id, $id = null)
    {
        $this->confName = $confName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->venue_id = $venue_id;
        $this->id = $id;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getConfName()
    {
        return $this->confName;
    }

    /**
     * @param mixed $confName
     */
    public function setConfName($confName)
    {
        $this->confName = $confName;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getVenueId()
    {
        return $this->venue_id;
    }

    /**
     * @param mixed $venue_id
     */
    public function setVenueId($venue_id)
    {
        $this->venue_id = $venue_id;
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

    public function save(){
        return \Repository\Conference::createInstance()->save($this);
    }



}