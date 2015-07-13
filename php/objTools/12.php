<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-检查类
 */
require "../argsAndType/4.php";

//你甚至可以检查用户自定义类的相关源代码
class ReflectionUtil{
    static function getClassSource(ReflectionClass $class){
        $path = $class->getFileName();
        $lines = @file($path);
        $from = $class->getStartLine();
        $to = $class->getEndLine();
        $len = $to-$from+1;
        return implode(array_slice($lines, $from-1, $len));
    }
}

echo "<br><br><br><br><br><br><pre>";
print ReflectionUtil::getClassSource(new ReflectionClass('CDProduct'));
