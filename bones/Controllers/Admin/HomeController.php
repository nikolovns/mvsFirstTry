<?php

namespace Controllers\Admin;

class HomeController extends \Controllers\MasterController {

    private function headerData() {
        session_start();
        $page = \Repository\Page::createInstance()
                ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');

        if (!$_SESSION['adminName']) {
            $this->redirectControllers('home', '');
        }

        $this->view->adminPart('header');
    }
    
    private function headerIndex() {
        //session_start();
        $page = \Repository\Page::createInstance()
                ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');

        $this->view->adminPart('header');
    }

    public function log() {

        $this->headerData();

        $pageTitle = \Repository\Page::createInstance()
                ->selectAllPages();

        $this->view->title = $pageTitle;

        $this->view->showView();
        $this->view->part('footer');
    }

    public function index() {
        
        $this->headerIndex();

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = \Repository\User::createInstance()
                    ->getOneByDetails($username, $password);
            
            $pass = $user->getPasword();
            $userName = $user->getUsername();
            $admin = $user->getAdmin();
            
            
            
            if (empty($userName) || $user->getAdmin() != 1) {
                $this->redirectControllers('home');
            }
                session_start();
                $_SESSION['adminName'] = $userName;

                $pageTitle = \Repository\Page::createInstance()
                        ->selectAllPages();
                
                $this->redirectAdminControllers('home', 'log');
        }
        $this->view->showView();
        $this->view->part('footer');
    }
    
    public function logout(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
        $this->redirectControllers('home', '');
    }

    public function add() {
       
        $page = $this->headerData();

        $errors = "";
        if (isset($_POST['add-page'])) {

            if (!empty(trim($_POST['title']))) {
                $title = $_POST['title'];
            }
            if (!empty(trim($_POST['label']))) {
                $label = $_POST['label'];
            }
            if (!empty(trim($_POST['slug']))) {
                $slug = $_POST['slug'];
            }
            if (!empty(trim($_POST['body']))) {
                $body = $_POST['body'];
            }
            if(empty($title || $label || $slug || $body)){
                $errors = "All fields are required!";
            }
            
            $page = new \Models\PageModel($label, $title, $body, $slug);

            $page->save();
            $this->redirectAdminControllers('home', 'log');
        }

        $this->view->showView();
        $this->view->part('footer');
    }

    public function edit() {

        $page = $this->headerData();
        
        $slug = array_pop($_GET);
        $slug = explode('/', trim($slug, '/'));
        $slug = array_pop($slug);

        $content = \Repository\Page::createInstance()
                ->selectOneContent($slug);
        $id = $content->getId();
        $pages = \Repository\Page::createInstance()
                ->selectById($id);

        $this->view->title = $pages->getTitle();
        $this->view->label = $pages->getLabel();
        $this->view->slug = $pages->getSlug();
        $this->view->body = $pages->getBody();
        $this->view->id = $pages->getId();

        if (isset($_POST['edit-page'])) {
            if (empty(trim($_POST['title']))) {
                $title = $_POST['title'];
            }
            if (empty(trim($_POST['label']))) {
                $label = $_POST['label'];
            }
            if (empty(trim($_POST['slug']))) {
                $slug = $_POST['slug'];
            }
            if (empty(trim($_POST['body']))) {
                $body = $_POST['body'];
            }

            $id = $_POST['name'];

            $updatePage = new \Models\PageModel($label, $title, $body, $slug, $id);

            $updatePage->update();

            $this->redirectAdminControllers('home', 'log');
        }

        $this->view->showView();
        $this->view->part('footer');
    }

    public function delete() {
        $id = array_pop($_GET);
        $id = explode('/', trim($id, '/'));
        $id = array_pop($id);

        $delete = \Repository\Page::createInstance()
                ->selectById($id);
        $id = $delete->getId();
        $delete->delete($id);

        $this->redirectAdminControllers('home', 'log');
    }

    public function addlogin() {



        $this->view->showView();
    }
}
