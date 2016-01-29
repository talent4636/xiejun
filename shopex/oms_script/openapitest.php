<?php
require 'Request.php';

//1. 定义基础参数  (系统参数 & 接口业务参数)
$params = array(
    'flag' => 'test',
    'token' => 'yIjgpsYCMwFNsIZppyKGgtMYNwUnOKBn',
    'ver' => '1',
    'method' => 'test.getList',
    'type' => 'json',
    'charset' => 'utf-8',
    'timestamp' => time(),
#    'start_time' => '2012-01-25 11:24:44',
#    'end_time' => '2016-01-25 11:24:51',
);
//2. 计算签名，加入参数
$sign = get_sign($params);
$params['sign'] = $sign;
//3. 请求接口
$url = 'http://dev.erp.com/index.php/openapi/rpc/service/';
$response = Request::post($url, $params, 20);

//4. 解析结构
print_r($response);


function get_sign($params){
    //todo get sign
    $token = $params['token'];
    return strtoupper(md5(strtoupper(md5(assemble($params))).$token));
}

function assemble($params){
    if(!is_array($params)){
        return null;
    }
    ksort($params,SORT_STRING);
    $sign = '';
    foreach($params AS $key=>$val){
        $sign .= $key . (is_array($val) ? assemble($val) : $val);
    }
    return $sign;
}



?>
