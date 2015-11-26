<?php

namespace HTTP;

class Session {

    protected $sessionParams;

    public function __construct($sessionParams = []) {
//        var_dump($sessionParams);
        $this->sessionParams = $sessionParams;
    }


    public function setSessionParams($sessionParams)
    {
        foreach ($sessionParams as $key => $value) {
            $this->sessionParams[$key] = $value;
        }
    }

    public function getSessionParams() {
//        foreach ($this as $key => $value) {
//            $this->sessionParams[$key] = $value;
//        }
//var_dump($this->sessionParams);
        return (object)$this->sessionParams;
    }

    public function deleteSession($key)
    {
        if (isset($_SESSION[$key])) {

            return session_destroy();
        }
        throw new \Exception('wrong session key');
    }

}