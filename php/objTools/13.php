<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-检查方法
 */
require "../argsAndType/4.php";

$prod_class = new ReflectionClass('CDProduct');
$methods = $prod_class->getMethods();

foreach($methods as $method){
    print methodData($method);
    print "<br>------<br>";
}

function methodData(ReflectionMethod $method){
    $details = "";
    $name = $method->getName();
    if($method->isUserDefined()){
        $details .= "$name is user defined<br>";
    }
    if($method->isInternal()){
        $details .= "$name is user biult-in<br>";
    }
    if($method->isAbstract()){
        $details .= "$name is abstruct<br>";
    }
    if($method->isPublic()){
        $details .= "$name is public<br>";
    }
    if($method->isProtected()){
        $details .= "$name is protected<br>";
    }
    if($method->isPrivate()){
        $details .= "$name is private<br>";
    }
    if($method->isStatic()){
        $details .= "$name is static<br>";
    }
    if($method->isFinal()){
        $details .= "$name is final<br>";
    }
    if($method->isConstructor()){
        $details .= "$name is the constructor<br>";
    }
    if($method->returnsReference()){
        $details .= "$name returns a reference (as opposed to value)<br>";
    }
    return $details;
}