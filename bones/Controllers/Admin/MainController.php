<?php

namespace Controllers\Admin;

class MainController extends \Controllers\MasterController {
    
    public function log() {
        session_start();
        
        if(!$_SESSION['adminName']) {
            $this->redirectControllers('home', '');
        }
        
        $pageTitle = \Repository\Page::createInstance()
                ->selectAllPages();
        
        $this->view->title = $pageTitle;
        
        $this->view->showView();
        
    }
    
    public function index() {
        session_start();
        $page = \Repository\Page::createInstance()
                ->selectAllPages();
        $this->view->page = $page;
        
        $this->view->part('header');
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = \Repository\User::createInstance()
                    ->getOneByDetails($username, $password);
            
            $userName = $user->getUsername();
            
            if(empty($userName) || $user->getAdmin() != 1) {
                $this->redirectControllers('home');
//                echo 'Oops! It looks like your admin name and/or password are incorrect. '
//                . 'Please try again.';
//                die();
            }
            //session_start();
            $_SESSION['adminName'] = $userName;
           
           $pageTitle = \Repository\Page::createInstance()
                ->selectAllPages();
           
            $this->redirectAdminControllers('Main', 'log');
        }
        
        $this->view->showView(); 
        $this->view->part('footer');
    }
    
    public function add(){
        session_start();
        if(!$_SESSION['adminName']) {
            $this->redirectControllers('home', '');
        }
        
        $this->view->part('header');
        
        $errors = [];
        if(isset($_POST['add-page'])) {
            
            if(empty(trim($_POST['title']))) {
                $errors[] = 'Title is Reqired';
            }
            if(empty(trim($_POST['label']))) {
                $errors[] = 'Label is Reqired';
            }
            if(empty(trim($_POST['slug']))) {
                $errors[] = 'Slug is Reqired';
            }
            if(empty(trim($_POST['body']))) {
                $errors[] = 'Body is Reqired';
            }
            $this->view->errors = $errors;
            
        }
        
        
        $this->view->showView(); 
    }
    
}
