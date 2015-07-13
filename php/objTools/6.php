<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-了解类中的方法
 */

class TestClass{

    public function pub(){
        //
    }

    public function pub2(){
        //
    }

    private function prvat(){
        //
    }

    protected function ptect(){
        //
    }

}

function outOfClass(){
    //
}

$string = is_callable("TestClass::pub");
$string2 = is_callable("outOfClass");
$string3 = is_callable("TestClass::pub2",false,$list);
$obj = new TestClass();
$array1 = is_callable(array($obj,'prvat'),false,$list2);
//var_dump($string);
//var_dump($string2);
//print_r($list);
//var_dump($string3);
//print_r($list2);
//var_dump($array1);
