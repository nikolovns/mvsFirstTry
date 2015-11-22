<?php

namespace Controllers\Admin;

class PageController extends \Controllers\MasterController {
    
    
       
    public function index() {
        
        
        $this->view->showView();
        
    }
    
    public function page() {
        
        $this->view->part('header');
        
        $this->view->showView();
        
    }
    
}
