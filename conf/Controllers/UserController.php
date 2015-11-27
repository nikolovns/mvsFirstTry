<?php

namespace Controllers;

use BindingModels\Index;
use BindingModels\Register;
use HTTP\Form;
use HTTP\HttpContext;
use HTTP\HttpRequest;
use Models\UserInfoModel;
use Models\UserModels;
use Repository\User;

class UserController extends MasterController {

    private $data = array();

    private $model;

//    public function __construct(\View $view, $controller, HttpContext $context, $params, $action) {
//        parent::__construct($view, $controller, $context, $params, $action);
//    }

    /**
     * @param Index $user
     * login user
     */


    public function index(Index $user) {
//var_dump($user);
        $this->headerData();

        $this->view->showView();
        $username = $user->getUsername();
        $password = $user->getPassword();

        if (!empty($username)) {
            $user = User::createInstance()
                ->getOneByDetails($username, $password);

            $id = $user->getId();

            if ( $username == $user->getUsername() && $id != null ) {

//                $this->getRequest()->getSession()->getSessionParams()->id = $id;

//                $args = array('user'=>$user->getUsername(), 'id'=>$id);
//                $httpObj = new HttpContext();
//                $httpObj->setSession($args);
//                $form = new Form($_POST);
//                $request = new HttpRequest($form);
//                $context = new HttpContext($request);
//
//                $a = $context->getRequest()->getPost()->getPostParam('name', 'insert');
//
//                $b = $context->getRequest()->getPost()->getPostParam('', 'insert');
//
//                var_dump($a);
//                var_dump($b);

                $this->getSession()->setSessionParams(['user'=>$user->getUsername(), 'id'=>$id]);

                var_dump($this->getSession()->getSessionParams('user'));
//                $this->view->user = $user->getUsername();
                $this->redirectControllers('userInfo', 'profile');
                exit;
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
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $gender = $user->getGender();

            $user = new UserModels($username, $password);

            /**
             * Save only username and password in table users
             */
            $user->save();

            $userData = User::createInstance()
                ->getOneByName($username);

            $id = $userData->getId();

            $userInfo = new UserInfoModel($gender, $firstName, $lastName, $email, $id);

            /**
             * save UserInfoController in table user_info
             */
            $userInfo->save();

            if($id != null) {
                $this->redirectControllers('user', 'index');
            }

        }
        $this->view->part('footer');
    }

    public function logout() {
        session_start();

        $this->getSession()->deleteSession('user');

        $this->redirectControllers('user', 'index');
        exit;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }


    /**
     * @GET
     * @/conf/user/$id=\d
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

