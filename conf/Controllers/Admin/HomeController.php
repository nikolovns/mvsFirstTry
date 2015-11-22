<?php

namespace Controllers\Admin;

use BindingModels\AddPage;
use BindingModels\Edit;
use BindingModels\Index;
use Controllers\MasterController;
use Models\PageModel;
use Repository\Page;
use Repository\User;

class HomeController extends MasterController {

    private function headerData() {
        session_start();
        $page = Page::createInstance()
                ->selectAllPages();
        $this->view->page = $page;

        if (!$_SESSION['adminName']) {
            $this->redirectControllers('home', '');
        }

        $this->view->adminPart('header');
    }

    /**
     * This function include standard header and Admin header
     */
    private function headerIndex() {
        $page = Page::createInstance()
                ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    /**
     * @param Index $user
     * login admin
     */
    public function index(Index $user) {

        $this->headerIndex();
        $this->view->showView();

        $username = $user->getUsername();
        $password = $user->getPassword();

        if ( !empty($username) ) {

            $user = User::createInstance()
                ->getOneByDetails($username, $password);

            $adminName = $user->getUsername();
//            var_dump($adminName);
            $admin = $user->getRoleId();
            if ( !empty($adminName) && $admin == 4 ) {

                session_start();
                $_SESSION['adminName'] = $username;

                $this->redirectAdminControllers('home', 'log');
            }

        }

        $this->view->part('footer');
    }

    public function log() {

        $this->headerIndex();

        $this->headerData();

        if (!isset($_SESSION['adminName'])) {
            $this->redirectControllers('home', '');
        }


        $pageTitle = Page::createInstance()
                ->selectAllPages();

        $this->view->title = $pageTitle;

        $this->view->showView();
        $this->view->part('footer');
    }

    public function logout(){

        if(!isset($_SESSION)){
            session_start();
        }

        session_destroy();
        $this->redirectControllers('home', 'index');
    }

    /**
     * @param AddPage $page
     */
    public function addPage(AddPage $page) {

        $this->headerIndex();
        $this->headerData();
        $this->view->showView();

        $label = $page->getLabel();
        $title = $page->getTitle();
        $body = $page->getBody();
        $slug = $page->getSlug();

        if($label && $title && $body && $slug) {
            $page = new PageModel($label, $title, $body, $slug);
            $page->save();
            $this->redirectAdminControllers('home', 'log');
        }

        $this->view->part('footer');
    }


    /**
     * @param Edit $page
     * Edit page -> using Binding model
     */
    public function edit(Edit $page) {

        $this->headerIndex();
        $this->headerData();

        $slug = array_pop($_GET);
        $slug = explode('/', trim($slug, '/'));
        $slug = array_pop($slug);

        $content = Page::createInstance()
            ->selectOneContent($slug);
        $id = $content->getId();
        $pages = Page::createInstance()
            ->selectById($id);

        $this->view->title = $pages->getTitle();
        $this->view->label = $pages->getLabel();
        $this->view->slug = $pages->getSlug();
        $this->view->body = $pages->getBody();
        $this->view->id = $pages->getId();

        $label = $page->getLabel();
        $title = $page->getTitle();
        $body = $page->getBody();
        $slug = $page->getSlug();
        $id = $page->getId();

        if($label && $title && $body && $slug && $id) {

            $updatePage = new PageModel($label, $title, $body, $slug, $id);

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

        $delete = Page::createInstance()
                ->selectById($id);
        $id = $delete->getId();
        $delete->delete($id);

        $this->redirectAdminControllers('home', 'log');
    }

    public function addlogin() {

        $this->view->showView();
    }
}
