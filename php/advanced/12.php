<?php

/**
 * Class AddressManager
 * 使用拦截器  __set()
 */

class Person{

    private $_name;
    private $_age;

    function __set($property, $value){
        $method = "set{$property}";
        if(method_exists($this,$method)){
            return $this->$method($value);
        }
    }

    function setName($name){
        $this->_name = $name;
        if(!is_null($name)){
            $this->_name = strtoupper($this->_name);
        }
    }

    function setAge($age){
        $this->_age = strtoupper($age);
    }

}

$person = new Person();
$person->name = 'Jone';
$person->age = 15;
print_r($person);

