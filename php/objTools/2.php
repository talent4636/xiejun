<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-php和包-php包和命名空间
 */

namespace com\getinstanse\util;
require_once "useful/global.php";
class Lister{
    public static function helloWorld(){
        print "hello from ".__NAMESPACE__."<br/>";
    }
}

Lister::helloWorld();
\Lister::helloWorld();


