<?php

namespace BindingModels;

class CreateConference {

    private $confName;
    private $startDate;
    private $endDate;
    private $name;
    private $address;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

//    function __construct($conf_name, $start_date, $end_date, $name, $address)
//    {
//        $this->conf_name = $conf_name;
//        $this->start_date = $start_date;
//        $this->end_date = $end_date;
//        $this->name = $name;
//        $this->address = $address;
//    }

    /**
     * @return mixed
     */



}
