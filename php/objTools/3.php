<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-php和包-php包和命名空间
 */

function __autoload($classname){
    if(preg_match('/\\\/', $classname)){ //如果有命名空间，添加处理
        $path = str_replace('\\',DIRECTORY_SEPARATOR,$classname);
    }else{
        $path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
    }
    require_once("{$path}.php");
}

