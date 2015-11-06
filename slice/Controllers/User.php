<?php

namespace Controllers;

use BindingModels\Index;
use BindingModels\Register;
use Models\UserModels;
use Repository\User;

class UserController extends MasterController {

    private $data = array();

    private $model;


    private function headerData() {
        if(!isset($_SESSION)) {
            session_start();
        }
//        session_start();
        $page = \Repository\Page::createInstance()
                ->selectAllPages();

        $this->view->page = $page;
        $this->view->part('header');
    }

    /**
     * @param Index $user
     */
    public function index(Index $user) {

        $this->headerData();
        $this->view->showView();

        $username = $user->getUsername();
        $password = $user->getPassword();

        if (!empty($username)) {
            $user = User::createInstance()
                ->getOneByDetails($username, $password);

            if ($username == $user->getUsername() ) { //&& md5($password) == $user->getPassword()
//                session_start();
                $_SESSION['user'] = $user->getUsername();
                $this->view->user = $user->getUsername();

                $this->redirectControllers('home', '');
            }
        }

        $this->view->part('footer');
    }

    /**
     * @param Register $user
     */
    public function register(Register $user) {

        $this->headerData();
        $this->view->showView();
        if( !empty($user) ) {
            $username = $user->getUsername();
            $password = $user->getPassword();
            $user = new UserModels($username, $password);
            $user->save();
        }
    }

    public function logout() {
        if (!isset($_SESSION['username'])) {
            session_start();
        }
        session_destroy();
        $this->redirectControllers('user', 'index');
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }


    /**
     * @GET
     * @/slice/user/$id=\d
     * @AUTHORIZE
     * @param $id
     */
    public function test($id) {

        $user = User::createInstance()
            ->getOneById($id);

        $this->view->user = $user;

        $this->headerData();

        $this->view->showCustomView('Neshto');

        $this->view->part('footer');

    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

}

