<?php

namespace Controllers\Admin;

class PageController {
    
    public function index() {
        $page = \Repository\Page::createInstance()
                ->selectAllPages();
        
        var_dump($page);
    }
    
}
