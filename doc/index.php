<?php
require_once 'main.php';

$main = new main();
// echo "<pre>";
// print_r($_SERVER);exit;
try {
    $main->mainFnc($main::router());
}catch (Exception $e){
    exit('服务器异常，请联系管理员。');
}




