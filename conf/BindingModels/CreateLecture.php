<?php

namespace BindingModels;

class CreateLecture {

    private $name;
    private $startTime;
    private $endTime;
    private $break;
    private $hallName;
    private $day;
    private $idConference;

    /**
     * @return mixed
     */
    public function getIdConference()
    {
        return $this->idConference;
    }

    /**
     * @param mixed $idConference
     */
    public function setIdConference($idConference)
    {
        $this->idConference = $idConference;
    }



    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
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
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getBreak()
    {
        return $this->break;
    }

    /**
     * @param mixed $break
     */
    public function setBreak($break)
    {
        $this->break = $break;
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