<?php

/**
 * Class AddressManager
 * 静态方法和属性
 */
class staticExample{

    static public $aNum = 0;

    static public function sayHello(){
        self::$aNum++;
        print "Hello (".self::$aNum."\n";
    }

}


