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
        $query = 'SELECT label, title, body, slug, id FROM page';

        $this->db->query($query);

        $result = $this->db->fetchAll();
        
        $allPages = [];
        
        foreach ($result as $key => $value) {
            $allPages[] = new \Models\PageModel(
                    $value['label'], 
                    $value['title'], 
                    $value['body'], 
                    $value['slug'],
                    $value['id']
            );
        }
        return $allPages;
    }
    
       
    public function updatePage(\Models\PageModel $page) {
        $query = 'UPDATE page SET label = ?, title = ?, body = ?, slug = ? WHERE id = ?';
        $param = [
            $page->getLabel(),
            $page->getTitle(),
            $page->getBody(),
            $page->getSlug(),
            $page->getId()
        ];
        
        $this->db->query($query, $param);
        return $this->db->row();
    }
    
    public function delete($id) {
        $query = 'DELETE FROM page WHERE id = ?';
        $this->db->query($query, [$id]);
    }
    
    
    public function selectById($id) {
        $query = 'SELECT label, title, body, slug, id FROM page WHERE id = ?';

        $this->db->query($query, [$id]);

        $result = $this->db->row();
        
        return new \Models\PageModel(
                $result['label'], 
                $result['title'], 
                $result['body'], 
                $result['slug'], 
                $result['id']
        );
    }
    
    
    public function selectOneContent($slug) {
        
        $query = 'SELECT label, title, body, slug, id FROM page WHERE slug = ?';

        $this->db->query($query, [$slug]);

        $result = $this->db->row();
        
        return new \Models\PageModel(
            $result['label'], $result['title'], $result['body'], $result['slug'], $result['id']
        );
    }
    
    public function save(\Models\PageModel $page) {
        $query = "INSERT INTO page (label, title, body, slug) VALUES (?, ?, ?, ?)";
        $param = [
            $page->getLabel(),
            $page->getTitle(),
            $page->getBody(),
            $page->getSlug()
        ];
        
        $this->db->query($query, $param);
        return $this->db->row();
    }

}
