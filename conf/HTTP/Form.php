<?php

namespace HTTP;

class Form {

    public $postParams;

    public function __construct($postParams = [])
    {
        $this->postParams = $postParams;
    }

    /**
     *
     * @return type
     */

    public function getPostParam($key, $default)
    {
        unset($_POST[$key]);
        foreach ($_POST as $key => $value) {
            $this->postParams[$key] = $value;

            return $this->postParams[$key];

        }
        return $default;
    }
}