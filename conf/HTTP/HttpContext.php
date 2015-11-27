<?php

namespace HTTP;

use HTTP\HttpRequest;

class HttpContext
{

    private $request;
    private $session;

    public function __construct(\HTTP\HttpRequest $request, \HTTP\Session $session)
    {
        $this->request = $request;
        $this->session = $session;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }
}

//    /**
//     * @param array $session
//     */
//    public function setSession($session)
//    {
//        foreach ($session as $key => $value) {
//
////            $_SESSION[$key] = $value;
//            $this->session[$key] = $value;
//        }
//    }
//
//    public function getSession() {
//        return $this->session;
//    }
//
//    public function deleteSession($key)
//    {
//        if (isset($_SESSION[$key])) {
//
//            return session_destroy();
//        }
//        throw new \Exception('wrong session key');
//    }


//class HttpContext
//{
//
//    protected $session = [];
//
//
//
//    function __construct($session = [])
//    {
//        $this->session[] = $session;
//    }
//
//    /**
//     * @param array $session
//     */
//    public function setSession($session)
//    {
//        foreach ($session as $key => $value) {
//
//            $_SESSION[$key] = $value;
//            $this->session = $_SESSION[$key];
//        }
//    }
//
//    public function getSession($key) {
//        return $_SESSION[$key];
//    }
//
//    public function deleteSession($key)
//    {
//        if (isset($_SESSION[$key])) {
//
//            return session_destroy();
//        }
//        throw new \Exception('wrong session key');
//    }
//}