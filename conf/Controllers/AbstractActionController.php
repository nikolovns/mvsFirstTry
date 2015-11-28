<?php

namespace Controllers;

class AbstractActionController
{

    public function getSession() {
        session_start();
        return $this->session = new \HTTP\Session($_SESSION);
    }

    public function getForm() {
        return $this->post = new \HTTP\Form($_POST);
    }

    public function getRequest() {
        return $this->request = new \HTTP\HttpRequest($this->getForm());
    }

    public function getContext()
    {

        return $this->context = new \HTTP\HttpContext($this->getRequest(), $this->getSession());
    }
}