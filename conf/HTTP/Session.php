<?php

namespace HTTP;

class Session {

    protected $sessionParams;

    public function __construct($sessionParams = []) {
//        var_dump($sessionParams);
        $this->sessionParams = $sessionParams;
    }

    /**
     * @return array
     */
    public function getSessionParams($key)
    {
        return $this->sessionParams[$key];
    }

    /**
     * @param array $sessionParams
     */
    public function setSessionParams($sessionParams)
    {
        foreach ($sessionParams as $key => $value) {

            $_SESSION[$key] = $value;
            $this->sessionParams = $_SESSION;
        }
    }

    public function deleteSession($key)
    {
        if (isset($_SESSION[$key])) {

            return session_destroy();
        }
        throw new \Exception('wrong session key');
    }

}