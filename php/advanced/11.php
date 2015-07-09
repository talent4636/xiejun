<?php

/**
 * Class AddressManager
 * 使用拦截器 __get()
 */

class Person{

    function __get($property){
        $method = "get{$property}";
        if(method_exists($this, $method)){
            return $this->$method();
        }
    }

    function getName(){
        return "Bob";
    }

    function getAge(){
        return 44;
    }

}

$person = new Person();
print $person->Name;
print $person->Age;

