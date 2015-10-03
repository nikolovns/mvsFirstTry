<?php

namespace Controllers\Admin;

class PageController extends \Controllers\MasterController {
    
    
    public function onLoad() {
        session_start();
        if(!isset($_SESSION['adminName'])) {
            $this->redirectControllers('home', '');
        }
    }
    
    public function index() {
        
        
        $this->view->showView();
        
    }
    
    public function page() {
        
        $this->view->part('header');
        
        $this->view->showView();
        
    }
    
}
