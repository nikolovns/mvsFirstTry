<?php

namespace Controllers;

use Repository\UserInfo;

class UserInfoController extends MasterController {

    private function headerData() {
        if(!isset($_SESSION)) {
            session_start();
        }
        $page = \Repository\Page::createInstance()
            ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }


    public function profile() {
        $this->headerData();

        $id = $this->getSession('id');

        $user = UserInfo::createInstance()
            ->selectAllById($id); // $_SESSION['id']

        $this->view->content = $user;

        /**
         * TODO
         * add user conferences
         * add I have to go -> conferences
         */

        $this->view->showView();

        $this->view->part('footer');
    }


}