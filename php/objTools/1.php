<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-php和包-php包和命名空间
 */

namespace my;
require_once "useful/Outputter.php";
class Outputter{
    //
}

//useful/Outputter.php
namespace userful;
class Outputter{

}

namespace com\getinstanse\util;
class Debug{
    static function helloWorld(){
        print "hello from Debug \n <br/>";
    }
}
//命名空间内直接调用
Debug::helloWorld();

//命名空间环境外调用  注意前面反斜杠
\com\getinstanse\util\Debug::helloWorld();

//这样会报错  除非开头的反斜杠告诉php从根命名空间而不是从当前命名空间开始搜索。
/*Fatal error: Class 'main\com\getinstanse\util\Debug' not found
in /data/www/xiejun/php/objTools/1.php on line 30*/
namespace main;
\com\getinstanse\util\Debug::helloWorld();

//利用use关键字，给com\getinstanse\util起别名 util
namespace main2;
use com\getinstanse\util;
util\Debug::helloWorld();

//如果main命名空间本身包含Debug类，会报错
/**
 * Fatal error: Cannot declare class main3\Debug because the
 * name is already in use in /data/www/xiejun/php/objTools/1.php on line 46
 */
//namespace main3;
//use com\getinstanse\util\Debug;
//class Debug{
//    static function helloWorld(){
//        print "hello from main3\\Debug";
//    }
//}
//Debug::helloWorld();

namespace main4;
use com\getinstanse\util\Debug as uDebug;
class Debug{
    static function helloWorld(){
        print "hello from main4\\Debug";
    }
}
uDebug::helloWorld();
Debug::helloWorld();