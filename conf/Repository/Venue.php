<?php

namespace Repository;

use Models\VenueModel;

class Venue {

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

    public function selectById($id) {
        $query = 'SELECT name, address, id FROM venues WHERE id = ?';

        $this->db->query($query, [$id]);

        $result = $this->db->row();

        return new \Models\VenueModel(
            $result['name'],
            $result['address'],
            $result['id']
        );
    }

    public function selectVenue() {
        $query = 'SELECT conf_name, start_date, end_date, venue_id, id from conferences';

        $this->db->query($query);

        $result = $this->db->fetchAll();

        $allVenues = [];

        $allConferences = [];

        foreach ($result as $key => $value) {
            $allConferences[] = new \Models\ConferenceModel(
                $value['conf_name'],
                $value['start_date'],
                $value['end_date'],
                $value['venue_id'],
                $value['id'],
                $allVenues[] = new \Models\VenueModel(
                    $value['name'],
                    $value['address']
                )
            );
        }

        return $allConferences;
    }

    public function save(\Models\VenueModel $venue) {
        $query = 'INSERT INTO venues (name, address) VALUES (?, ?)';
        $param = [
            $venue->getName(),
            $venue->getAddress()
        ];

        $this->db->query($query, $param);
        return $this->db->row();
    }

    public function getOneByName($venue) {
        $query = "SELECT name, id FROM venues WHERE name = ?";
        $this->db->query($query, [$venue]);
        $result = $this->db->row();
        return $this->getOneById($result['id']);
    }

    public function selectId() {
        $query = 'SELECT name, address, id FROM venues';

        $this->db->query($query);

        $result = $this->db->fetchAll();

        $allId = [];

        foreach ($result as $key => $value) {
            $allId[] = new \Models\VenueModel(
                $value['name'],
                $value['address'],
                $value['id']
            );
        }
        $id = array_pop($allId);
        $id = $id->getId();
        return $id;
    }


    public function getOneById($id) {
        $query = "SELECT name, address, id FROM venues WHERE id = ?";
        $this->db->query($query, [$id]);

        $result = $this->db->row();
        return new \Models\VenueModel(
            $result['name'], $result['address'], $result['id']
        );
    }

    public function selectByConferenceId($id){
        $query = "SELECT v.name, v.address, v.id
                  FROM venues v
                  JOIN conferences c ON c.venue_id = v.id
                  WHERE c.id = ?";

        $this->db->query($query, [$id]);

        $result = $this->db->row();

        return new \Models\VenueModel(
            $result['name'], $result['address'], $result['id']
        );
    }



//    public function save(\Models\PageModel $page) {
//        $query = "INSERT INTO page (label, title, body, slug) VALUES (?, ?, ?, ?)";
//        $param = [
//            $page->getLabel(),
//            $page->getTitle(),
//            $page->getBody(),
//            $page->getSlug()
//        ];
//
//        $this->db->query($query, $param);
//        return $this->db->row();
//    }


}