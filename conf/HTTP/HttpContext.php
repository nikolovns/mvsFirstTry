<?php

namespace HTTP;

class HttpContext
{

    protected $session = [];

    function __construct($session = [])
    {
        $this->session[] = $session;
    }

    /**
     * @param array $session
     */
    public function setSession($session)
    {
        foreach ($session as $key => $value) {

            $_SESSION[$key] = $value;
            $this->session = $_SESSION[$key];
        }
    }

    public function getSession($key) {
        return $_SESSION[$key];
    }

    public function deleteSession($key)
    {
        if (isset($_SESSION[$key])) {
            return session_destroy();
        }
        throw new \Exception('wrong session key');
    }
}