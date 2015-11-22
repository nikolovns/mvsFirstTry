<?php

namespace Models;

class LectureModel {

    private $id;
    private $name;
    private $startTime;
    private $endTime;
    private $break;
    private $user_id;
    private $hall_id;
    private $conference_id;
    private $day;

    function __construct($name, $startTime, $endTime, $break, $hall_id, $conference_id, $day, $id = null, $user_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->break = $break;
        $this->user_id = $user_id;
        $this->hall_id = $hall_id;
        $this->conference_id = $conference_id;
        $this->day = $day;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param null $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getHallId()
    {
        return $this->hall_id;
    }

    /**
     * @param mixed $hall_id
     */
    public function setHallId($hall_id)
    {
        $this->hall_id = $hall_id;
    }

    /**
     * @return mixed
     */
    public function getConferenceId()
    {
        return $this->conference_id;
    }

    /**
     * @param mixed $conference_id
     */
    public function setConferenceId($conference_id)
    {
        $this->conference_id = $conference_id;
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

    //make method save in Hall Repository
    public function save() {
        \Repository\Lecture::createInstance()->save($this);
    }

}