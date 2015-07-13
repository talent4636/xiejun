<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * @desc 对象工具-反射API-开始行动
 */
require "../argsAndType/4.php";

$prod_class = new ReflectionClass( 'CDProduct' );
echo "<hr><br><br><br><br><pre>";
Reflection::export( $prod_class );
