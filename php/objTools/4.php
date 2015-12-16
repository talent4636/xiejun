<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-类函数和和对象函数-查找类
 */

$classname = "Task";
require_once("useful/{$classname}.php");
$classname = "tasks\\$classname";
$myObj = new $classname();
$myObj->doSpeak();

echo "<hr/><pre>";
print_r(get_declared_classes());