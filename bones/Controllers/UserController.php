<?php

namespace Controllers;

class UserController extends \Controllers\MasterController {

    private $data = [];
    
    /**
     * @var \Repository\User
     */
    
    private function headerData() {
        session_start();
        $page = \Repository\Page::createInstance()
                ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');

    }
    
    
    public function index() {
        
        $this->headerData();
        $this->view->showView();
        session_start();
        //$this->view->part('header');
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $_SESSION['user'] = $username;
            
            $user = \Repository\User::createInstance()
                    ->getOneByDetails($username, $password);
            $this->load($user);
        }
        
//        if(isset($_SESSION['user'])) {
//            $username = $_SESSION['user'];
//            
//            $user = \Repository\User::createInstance()
//                    ->getOneByName($username);
//            
//            $userId = $user->getId();
//            
//            $this->load($user);
//        }
        
         
        $this->view->part('footer');
    }
    
    public function load($user) {
        
        $_SESSION['userId'] = $user->getId();
        $this->view->user = $user->getUsername();
        $this->view->userId = $user->getId();
        
        $this->redirectControllers('home', '');
        
    }
    
    public function register() {
        
        $this->view->showView();

        if (isset($_POST['register'])) {
            session_start();
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $user = new \Models\UserModels($username, $password);

            $user->save();
            // change session name
            $_SESSION['user'] = $username;
            $this->load($user);
        }
    }
    
    public function logout(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
        $this->redirectViews('login');
    }
    
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
    
    public function __get($name) {
        return $this->data[$name];
    }
}
