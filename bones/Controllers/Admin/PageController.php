<?php

namespace Controllers\Admin;

class PageController extends \Controllers\MasterController {
    
    
    public function onLoad() {
        session_start();
        if(!isset($_SESSION['userId'])) {
            $this->redirectControllers('home', '');
        }
    }
    
    
    
    
//    public function load($user) {
//        
//        $_SESSION['userId'] = $user->getId();
//        $this->view->user = $user->getUsername();
//        $this->view->userId = $user->getId();
//        
//        $this->redirectControllers('home', '');
//        
//    }
    
}
