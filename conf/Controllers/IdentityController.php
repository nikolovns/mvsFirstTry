<?php

namespace Controllers;

use Repository\User;

class IdentityController {

    public function getUserModel() {

        $this->getAllClasses();

        $classes = get_declared_classes();

        foreach ($classes as $class) {
            $reflection = new \ReflectionClass($class);

            foreach ($reflection as $classNamespace) {

                if(substr($classNamespace, 0, 11) == 'Models\\User') {

                    $methods = $reflection->getMethods();
                    $properties = $reflection->getProperties();

                    $classProperties = [];
                    foreach ($properties as $property) {

                        $pole = $this->metadata();

                        foreach ($pole as $key => $value) {
                            if ($key == $property->name) {
                                $classProperties[] = [$property->name => $value];
                            }
                        }

                    }

                    $className = str_replace('Models\\', '', $classNamespace);
                    $className = str_replace('Model', '', $className);

                    $model = User::createInstance()
                        ->getCheck(lcfirst($className));

                    if (empty($model)) {

                        $createTable = User::createInstance()
                            ->createTable($className, $classProperties);
                    }
                }
            }

        }

    }

    private function metadata()
    {
        return [
            'id' => ['int(11)','not null','primary key', 'AUTO_INCREMENT'],
            'username' => ['varchar(45)', 'not null'],
            'password' => ['char(32)', 'not null'],
            'role_id' => ['int(11)', 'not null'],

            'user_id' => ['int(11)', 'not null', 'primary key'],
            'gender' => ['VARCHAR(7)', 'null'],
            'first_name' => ['VARCHAR(45)', 'not null'],
            'last_name' => ['VARCHAR(45)', 'not null'],
            'email' => ['VARCHAR(45)', 'not null']
        ];
    }

    public function getAllClasses() {
        foreach (glob('Models/*.php') as $file)
        {
            require_once $file;
        }
    }

}