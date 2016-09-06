<?php
/**
 * Created by PhpStorm.
 * User: xiejun
 * Time: 16/9/6 10:30
 */

$apiUrl = 'http://dev.bbc.com/index.php/api';//请求地址，dev.bbc.com换成自己的域名
$token = NULL;//测试环境为空，如果是线上环境，看certi.php中的token，更加靠谱的是用base_certificate::token()获取
$method = 'sku.list';//接口方法名
$params = array(//请求参数
    #系统级参数
    'format' => 'json',
    'v' => 'v1',
    'timestamp'=>time(),
    'sign_type'=>'MD5',
    #应用级参数，根据不同的接口有所变化
    'sku_ids'=>'1',
    'fields'=>'1',
);
$params['method'] = $method;
$params['sign'] = get_bbc_sign($params,$token);

#请求接口方法调用
$result = post($apiUrl,$params,10);
echo "===============API RESULT===============<pre>\n";
print_r(json_decode($result,1));
echo "========================================\n";

#POST 方法
function post($url, $post_data = '', $timeout = 5){
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_POST, 1);
    if($post_data != ''){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}

#获取签名方法。跟ECStore和ERP相同
function get_bbc_sign($params, $token){
    return strtoupper(md5(strtoupper(md5(assemble($params))).$token));
}
function assemble($params) {
    if(!is_array($params))  return null;
    ksort($params, SORT_STRING);
    $sign = '';
    foreach($params AS $key=>$val){
        if(is_null($val))   continue;
        if(is_bool($val))   $val = ($val) ? 1 : 0;
        $sign .= $key . (is_array($val) ? assemble($val) : $val);
    }
    return $sign;
}
