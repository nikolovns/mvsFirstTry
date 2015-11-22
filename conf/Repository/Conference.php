<?php

namespace Repository;

use Models\VenueModel;

class Conference {

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

    public function selectAllConferencesDetails() {
        $query = 'SELECT c.confName, c.startDate, c.endDate, c.venue_id, c.id, v.name, v.address
                  FROM conferences c
                  JOIN venues v
                  ON v.id = c.venue_id';

        $this->db->query($query);

        $result = $this->db->fetchAll();

        $allConferences = [];

        foreach ($result as $key => $value) {
            $allConferences[] = new \BindingModels\Conference(
                $value['confName'],
                $value['startDate'],
                $value['endDate'],
                $value['venue_id'],
                $value['id'],
                $value['name'],
                $value['address']
            );
        }
        return $allConferences;
    }

    public function selectConferenceById($id) {

        $query = 'SELECT confName, startDate, endDate, id FROM conferences where id = ?';

        $this->db->query($query, [$id]);
        return $this->db->row();
    }

    public function save(\Models\ConferenceModel $conf) {
        $query = 'INSERT INTO conferences (confName, startDate, endDate, venue_id, user_id)
                  VALUES (?, ?, ?, ?, ?)';
        $param = [
            $conf->getConfName(),
            $conf->getStartDate(),
            $conf->getEndDate(),
            $conf->getVenueId(),
            $conf->getUserId()
        ];

        $this->db->query($query, $param);
        return $this->db->row();
    }


}