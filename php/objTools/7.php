<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-了解类属性
 */

class TestClass{

    public $pub = '1111';
    public $pub2 = '2222';
    private $prv = '3333';
    protected $proct = '4444';

}

print_r(get_class_vars('TestClass'));


