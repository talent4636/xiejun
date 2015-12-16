<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-检查方法（获取源代码）
 */
require "../argsAndType/4.php";

class ReflectionUtil{
    static function getMethodSource( ReflectionMethod $method ){
        $path = $method->getFileName();
        $lines = @file( $path );
        $from = $method->getStartLine();
        $to = $method->getEndLine();
        $len = $to - $from;
        return implode( array_slice($lines, $from-1, $len+1));
    }
}
echo "<br><br><br><br><br><br><pre>";
$class = new ReflectionClass('CDProduct');
$method = $class->getMethod('getSummaryLine');
print ReflectionUtil::getMethodSource($method);

