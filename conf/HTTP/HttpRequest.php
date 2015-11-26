<?php

namespace HTTP;

class HttpRequest
{

    private $post;

    public function __construct(\HTTP\Form $post)
    {
        $this->post = $post;
    }

    public function getPost()
    {
        return $this->post;
    }
}

//class Request{
//
//    protected $getParam;
//
//    protected $postParam;
//
//    protected $method;
//
//    protected $url;
//
//    protected $query;
//
//    public function __construct(\Form $postParam) {
//        $this->postParam = $postParam;
//    }
//
//
//
//
//    /**
//     * @return mixed
//     */
//    public function getGetParam()
//    {
//        return $this->getParam;
//    }
//
//    /**
//     * @param mixed $getParam
//     */
//    public function setGetParam($getParam)
//    {
//        $this->getParam = $getParam;
//    }
//
//    /**
//     * @param $key
//     * @return mixed
//     */
//    public function getPostParam($key)
//    {
//        return $_POST[$key];
//    }
//
//    /**
//     * @param mixed $postParam
//     */
//    public function setPostParam($postParam)
//    {
//        foreach($postParam as $key=>$value){
////            $_POST[$key] =  $value;
////            $this->postParam = $_POST[$key];
//            var_dump($value);
//        }
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getMethod()
//    {
//        return $this->method;
//    }
//
//    /**
//     * @param mixed $method
//     */
//    public function setMethod($method)
//    {
//        $this->method = $method;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getUrl()
//    {
//        return $this->url;
//    }
//
//    /**
//     * @param mixed $url
//     */
//    public function setUrl($url)
//    {
//        $this->url = $url;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getQuery()
//    {
//        return $this->query;
//    }
//
//    /**
//     * @param mixed $query
//     */
//    public function setQuery($query)
//    {
//        $this->query = $query;
//    }
//
//
//
//
//
//
//
//
//
//}