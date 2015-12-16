<?php

/**
 * Class AddressManager
 * 使用拦截器  __call()
 */

class Person{

    function __call($method, $args){
        $i = 1;
        $args_str = '';
        foreach($args as $v){
            $args_str .= "arg ".$i." is (".$v.")";
            $i ++;
        }
        exit("you called an unexist funciton {$method}, and {$args_str}");
    }

}

$person = new Person();
$person -> hello('arg1','arg2','xxxxx','asdfasdfa');

