<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Date: 15/6/16
 * Time: 下午2:05
 */

$arr = array(
    array(
        'username' => 'zhangsan',
        'content' => 'this is what i said,haahaaha.'
    ),
    array(
        'username' => 'xiejun',
        'content' => 'this is what i said.'
    ),

);
exit(json_encode($arr));