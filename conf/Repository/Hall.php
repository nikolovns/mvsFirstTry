<?php

namespace Repository;

use Models\HallModel;

class Hall {

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


    public function save(\Models\HallModel $model) {
        $query = 'INSERT INTO halls (seating, venue_id, hallName) VALUE (?, ?, ?)';

        $params = [
            $model->getSeating(),
            $model->getVenue_Id(),
            $model->getHallName()
        ];

        $this->db->query($query, $params);

        return $this->db->row();
    }

    public function getHallIdByConference($confId, $hallName) {
        $query = 'SELECT h.id, h.seating, h.hallName, h.venue_id
                  FROM `halls` AS h
                  JOIN `venues` AS v ON v.id = h.venue_id
                  JOIN `conferences` AS c ON c.venue_id = v.id
                  WHERE c.id = ? and h.hallName = ?';

        $this->db->query($query, [$confId, $hallName]);
        return $this->db->row();
    }

}