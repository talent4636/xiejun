<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-检查类
 */
require "../argsAndType/4.php";

function classData(ReflectionClass $class){
    $detail = '';
    $name = $class->getName();
    if($class->isUserDefined()){
        $detail .= "$name is user defined <br>";
    }
    if($class->isInternal()){
        $detail .= "$name is built-in <br>";
    }
    if($class->isInterface()){
        $detail .= "$name is interface <br>";
    }
    if($class->isAbstract()){
        $detail .= "$name is abstract class <br>";
    }
    if($class->isFinal()){
        $detail .= "$name is a final class <br>";
    }
    if($class->isInstantiable()){
        $detail .= "$name can be instantiated <br>";
    }else{
        $detail .= "$name can not be instantiated <br>";
    }
    return $detail;
}

$prod_class = new ReflectionClass( 'CDProduct' );
echo "<hr><br><br><br><br><pre>";
print classData($prod_class);
