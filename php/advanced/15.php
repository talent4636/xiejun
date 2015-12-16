<?php

/**
 * Class AddressManager
 * 定义对象的字符串值
 */

class Person{

    function getName(){
        return "bob";
    }

    function getAge(){
        return "44";
    }

    //必须返回一个字符串
    function __toString(){
        $desc = $this->getName();
        $desc .= " (age ".$this->getAge(). ")";
        return $desc;
    }
}

$person = new Person();
print $person;//以字符串的形式打印对象，__toString方法被调用

