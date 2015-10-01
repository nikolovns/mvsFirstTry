<?php

namespace Repository;

class Page {

    /**
     *
     * @var \Database\Db
     */
    protected $db;

    /**
     *
     * @var \Repository\Page
     */
    protected static $inst;

    private function __construct(\Database\Db $db) {
        $this->db = $db;
    }

    /**
     * 
     * @return Page
     */
    public static function createInstance() {
        if (self::$inst == null) {
            self::$inst = new self(\Database\Db::getInstance());
        }
        return self::$inst;
    }

    public function selectAllPages() {
        $query = 'SELECT label, title, body, slug FROM page';

        $this->db->query($query);

        $result = $this->db->fetchAll();
        
        $allPages = [];
        
        foreach ($result as $key => $value) {
            $allPages[] = new \Models\PageModel(
                    $value['label'], 
                    $value['title'], 
                    $value['body'], 
                    $value['slug']
            );
        }
        return $allPages;
    }
    
    public function selectOneContent($slug) {
        
        $query = 'SELECT label, title, body, slug FROM page WHERE slug = ?';

        $this->db->query($query, [$slug]);

        $result = $this->db->row();
        
        return new \Models\PageModel(
            $result['label'], $result['title'], $result['body'], $result['slug']
        );
    }

}
