<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-检查方法参数
 */
require "../argsAndType/4.php";

$prod_class = new ReflectionClass('CDProduct');
$method = $prod_class->getMethod('__construct');
$params = $method->getParameters();

foreach($params as $param){
    print argData($param)."<br>";
}

function argData(ReflectionParameter $arg){
    $details = "";
    $declaringclass = $arg->getDeclaringClass();
    $name = $arg->getName();
    $class = $arg->getClass();
    $position = $arg->getPosition();
    $details .= "\$$name has position $position <br>";
    if(!empty($class)){
        $classname = $class->getName();
        $details .= "\$$name must be a $classname object<br>";
    }
    if($arg->isPassedByReference()){
        $details .= "\$$name is passed by reference<br>";
    }
    if($arg->isDefaultValueAvailable()){
        $def = $arg->getDefaultValue();
        $details .= "\$$name has default: $def<br>";
    }
    return $details;
}

