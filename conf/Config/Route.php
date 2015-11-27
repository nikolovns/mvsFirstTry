<?php

namespace Config;

class Route {

    private $customRoute = false;

    /**
     * @var \View
     */
    private $view;

    /**
     * @throws \Exception
     */
    public function runs() {

        $classAttributes = $this->getClassAnnotation();

//        echo htmlspecialchars(var_dump($classAttributes));


        $requestUri = explode('/' , trim($_SERVER["REQUEST_URI"], '/') );
        echo '<br />';

        $controller = '';
        $method = '';
        $param = '';

        $matches = true;

        foreach ($classAttributes as $attribute) {
            $params = explode('/', trim($attribute['route'], '/') );

            $route = array_shift($params);

            if($route == 'ROUTE') {
                $matches = true;

//var_dump($params);
                for ($i = 0; $i<count($params); $i++) {
                    $type = '';

                    if (substr($params[$i], 0, 1) != '$') {
                        if ($params[$i] != $requestUri[$i]) {
                            $matches = false;
                            break;
                        }

                        $params[$i] = $requestUri[$i];
                        $controller = $attribute['class'];
                        $method = $attribute['method'];

                        continue;

                    } else {
                        $type = substr($params[$i], -2, 2);

                        if ($type == '\d') {
                            if (is_numeric($requestUri[$i])) {
//var_dump($params[$i]);
                                $params[$i] = $requestUri[$i];
                                $param = $params[$i];
                            } else {
                                $matches = false;
                                break;
                            }

                        }

                        $params[$i] = $requestUri[$i];

                        $param = $params[$i];
                    }

                    if($matches) {
                        $this->view = new \View($controller, $method);
//var_dump($this->view);
                        $class = new $controller($this->view, '');

                        $class->$method($param);

                        $this->customRoute = true;
                        return $method;
                    }

                }
            }
        }

    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getClassAnnotation() {

        $classAttributes = [];
        $this->getAllClasses();
        $classes = get_declared_classes();

        foreach ($classes as $class) {
            $reflection = new \ReflectionClass($class);

            $methods = $reflection->getMethods();

            foreach ( $methods as $method ) {
                $annotations = $method->getDocComment();

                preg_match_all('#@(.*?)\s#', $annotations, $annotation);

                if($annotation[1] != null) {

                    if(empty($method->name)) {
                        throw new \Exception('You have no method!');
                    }
                    $action = $method->name;

                    if(empty($annotation[1][0])) {
                        $annotation[1][0] = 'GET';
                    }
                    $type = $annotation[1][0];

                    if(empty($annotation[1][1])) {
                        $annotation[1][1] = '';
                    }
                    $route = $annotation[1][1];

                    if(empty($annotation[1][2])) {
                        $annotation[1][2] = 'UNAUTHORIZE';
                    }
                    $authorize = $annotation[1][2];

                    $classAttributes[] = [
                        'method' => $action,
                        'type' => $type,
                        'route' => $route,
                        'authorize' => $authorize,
                        'class' => $class
                    ];
                }
            }
        }
        return $classAttributes;
    }

    public function getAllClasses() {
        foreach (glob('Controllers/*.php') as $file)
        {
            require_once $file;
        }
    }

    /**
     * @return bool
     */
    public function getCustomRoute() {
        return $this->customRoute;
    }

}

//<?php
//
//namespace Config;
//
//class Route {
//
//    private $customRoute = false;
//
//    /**
//     * @var \View
//     */
//    private $view;
//
//    /**
//     * @throws \Exception
//     */
//    public function runs() {
//
//        $classAttributes = $this->getClassAnnotation();
//
////        echo htmlspecialchars(var_dump($classAttributes));
//
//
//        $requestUri = explode('/' , trim($_SERVER["REQUEST_URI"], '/') );
//
//        $controller = '';
//        $method = '';
//        $param = '';
//
//        foreach ($classAttributes as $attribute) {
//            $params = explode('/', trim($attribute['route'], '/') );
//            var_dump($params);
//            $matches = true;
//
//            for ($i = 0; $i<count($params); $i++) {
//                $type = '';
//
//                if (substr($params[$i], 0, 1) != '$') {
//                    if ($params[$i] != $requestUri[$i]) {
//                        $matches = false;
//                        break;
//                    }
//
//                    $params[$i] = $requestUri[$i];
//                    $controller = $attribute['class'];
//                    $method = $attribute['method'];
//
//                    continue;
//
//                } else {
//                    $type = substr($params[$i], -2, 2);
//
//                    if ($type == '\d') {
//                        if(is_numeric($requestUri[$i])) {
//                            $params[$i] = $requestUri[$i];
//                            $param = $params[$i];
//                        }
////                        } else {
////                            $matches = false;
////                            break;
////                        }
//                    } elseif($type == '\w') {
//                        $params[$i] = $requestUri[$i];
//
//                        $param = $params[$i];
//                    }
//
//                }
//
//                if($matches) {
//                    $this->view = new \View($controller, '');
//
//                    $class = new $controller($this->view, '');
//
//                    $class->$method($param);
//                    $this->customRoute = true;
//                    break;
//                }
//
//            }
//        }
//    }
//
//    /**
//     * @return array
//     * @throws \Exception
//     */
//    public function getClassAnnotation() {
//
//        $classAttributes = [];
//        $this->getAllClasses();
//        $classes = get_declared_classes();
//
//        foreach ($classes as $class) {
//            $reflection = new \ReflectionClass($class);
//
//            $methods = $reflection->getMethods();
//
//            foreach ( $methods as $method ) {
//                $annotations = $method->getDocComment();
//
//                preg_match_all('#@(.*?)\s#', $annotations, $annotation);
//
//                if($annotation[1] != null) {
//
//                    if(empty($method->name)) {
//                        throw new \Exception('You have no method!');
//                    }
//                    $action = $method->name;
//
//                    if(empty($annotation[1][0])) {
//                        $annotation[1][0] = 'GET';
//                    }
//                    $type = $annotation[1][0];
//
//                    if(empty($annotation[1][1])) {
//                        $annotation[1][1] = '';
//                    }
//                    $route = $annotation[1][1];
//
//                    if(empty($annotation[1][2])) {
//                        $annotation[1][2] = 'UNAUTHORIZE';
//                    }
//                    $authorize = $annotation[1][2];
//
//                    $classAttributes[] = [
//                        'method' => $action,
//                        'type' => $type,
//                        'route' => $route,
//                        'authorize' => $authorize,
//                        'class' => $class
//                    ];
//                }
//            }
//        }
//        return $classAttributes;
//    }
//
//    public function getAllClasses() {
//        foreach (glob('Controllers/*.php') as $file)
//        {
//            require_once $file;
//        }
//    }
//
//    /**
//     * @return bool
//     */
//    public function getCustomRoute() {
//        return $this->customRoute;
//    }
//
//}