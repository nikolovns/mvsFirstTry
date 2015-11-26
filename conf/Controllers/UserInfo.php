<?php

namespace Controllers;

use Repository\UserInfo;

class UserInfoController extends MasterController {

    public function profile() {
        $this->headerData();

        var_dump($this->getRequest()->getSession()->getSessionParams()->name);

        $user = UserInfo::createInstance()
            ->selectAllById(66); // $_SESSION['id']

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