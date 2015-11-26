<?php

namespace Repository;

use BindingModels\CreateLecture;
use Models\LectureModel;

class Lecture {

    /**
     * @var \Database\Db
     */
    protected $db;

    /**
     * @var \Repository\Conference
     */
    protected static $inst;

    private function __construct(\Database\Db $db) {
        $this->db = $db;
    }

    public static function createInstance() {
        if(self::$inst == null) {
            self::$inst = new self(\Database\Db::getInstance());
        }
        return self::$inst;
    }

//
    public function getLectureDetailsByConferenceId($id) {
        $query = 'SELECT name, startTime, endTime, break, hall_id, conference_Id, day, l.id, user_id
                  FROM lectures as l
                  JOIN conferences as c on c.id = l.conference_id
                  WHERE c.id = ?';
        $this->db->query($query, [$id]);
        $result = $this->db->fetchAll();

        $lecture = [];

        foreach ($result as $key => $value) {
            $lecture[] = new LectureModel(
                $value['name'],
                $value['startTime'],
                $value['endTime'],
                $value['break'],
                $value['hall_id'],
                $value['conference_Id'],
                $value['day'],
                $value['id'],
                $value['user_id']
            );
        }
        return $lecture;
    }


    public function save(LectureModel $lecture) {

        $query = 'INSERT INTO lectures (name, startTime, endTime, break, hall_id, conference_id, day) VALUES(?, ?, ?, ?, ?, ?, ?)';

        $param = [
            $lecture->getName(),
            $lecture->getStartTime(),
            $lecture->getEndTime(),
            $lecture->getBreak(),
            $lecture->getHallId(),
            $lecture->getConferenceId(),
            $lecture->getDay()
        ];

        $this->db->query($query, $param);
        return $this->db->row();
    }

    public function getLecturesById($id) {
        $query = 'SELECT name, startTime, endTime, break, hall_id, conference_Id, day, l.id
                  FROM lectures as l
                  WHERE c.id = ?';
        $this->db->query($query, [$id]);
        $result = $this->db->fetchAll();

        $lecture = [];

        foreach ($result as $key => $value) {
            $lecture[] = new LectureModel(
                $value['name'],
                $value['startTime'],
                $value['endTime'],
                $value['break'],
                $value['hall_id'],
                $value['conference_Id'],
                $value['day'],
                $value['id']
            );
        }
        return $lecture;
    }



}