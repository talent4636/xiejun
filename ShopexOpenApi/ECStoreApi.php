<?php
/**
 * @desc 测试文件
 * 
 *         本文件请注意保密，涉及签名算法。
 *         如有泄露，请立即更改签名规则（请求和服务端同步）
 *         
 */

//生成签名算法
function get_sign($params){
    return strtoupper(md5(strtoupper(md5(assemble($params)))));
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
//END 生成签名算法

//生成openapi的标准url
function openapi_url($url,$openapi_service_name,$method='access',&$params=null){
    if(substr($openapi_service_name,0,8)!='openapi.'){
        return false;
    }
    $arg = array();
    foreach((array)$params as $k=>$v){
        $arg[] = urlencode($k);
        $arg[] = urlencode(str_replace('/','%2F',$v));
    }
    $url = $url.'/index.php/openapi/'.substr($openapi_service_name,8).'/'.$method.'/'.implode('/',$arg);
    return $url;
}

//post数据并返回结果
function send_post($openapi_url, $post_data) {
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 5 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($openapi_url, false, $context);
    return $result;
}

//获取结果
function result($params){
    $sign = get_sign($params);
    $params_new = $params;
    unset($params_new['openapi_key'],$params_new['openapi_method'],$params_new['url']);
    $url = openapi_url($params['url'],$params['openapi_key'],$params['openapi_method'],$params_new);
    $params['sign'] = $sign;
    if (!$sign){
        exit('签名（sign）是必须参数，请检查');
    }
    $response = send_post($url,$params);
    return $response;
}

//参数
$params = array(
    'url' => 'http://www.ttmama.com',                       //域名
    'openapi_key' => 'openapi.ttmamachatapi',               //openapikey
    'openapi_method' => 'getAllOrders',                     //openapi 方法
    'member_id' => '3',                                     //参数1，用户 member_id  不需要时留空
    'product_id' => '549',                                  //参数2，商品ID（严格说是货品id） 不需要时留空
    'time' => time(),                                       //时间戳，必须
);

$info = result($params);
// $arr = json_decode($info);
echo ($info);exit;

