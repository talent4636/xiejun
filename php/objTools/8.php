<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-方法调用
 */

class TestClass{

    public static function class_func($arg = null){
        print "I'm a calss::func. ".($arg?"arg is $arg":'')."<br/>";
    }

}

function func(){
    print "i'm just func<br/>";
}
//调用方法
$result = call_user_func("func");
//调用类方法
$obj = new TestClass();
$result2 = call_user_func(array($obj,"class_func"));
//传递参数
$result2 = call_user_func(array($obj,"class_func"),'haha');
