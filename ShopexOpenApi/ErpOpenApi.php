<?php
class test{
    private $url = 'http://commercedemo.shopex123.com/erp/index.php/openapi/rpc/service/';
    
    function gen_matrix_sign($params){
        $token = $params['token'];
        return strtoupper(md5(strtoupper(md5($this->assemble($params))).$token));
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
    
    function gen_sign($params){
        $sign = $this->gen_matrix_sign($params);
        return $sign;
    }

 function result($params){
        $sign = $this->gen_sign($params);
        $params['sign'] = $sign;
        $response = $this->send_post($this->url,$params);
        echo $response;
    }
    
function send_post($url, $post_data) {
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;

}
}

$test = new test;
$params = array(
//         'apiName' => 'sales.getList',
    'flag' => '1600929432',//标识
    'token' => 'vLcYuVtPKRWyowVtAavNGbNoxwmUVjGi',//接口调用私钥
    'ver' => 1,
    'method' => 'sales.getList',
    'type' => 'json',//可选
    'charset' => 'utf-8',
    'timestamp' => time(),
    'page_no' => 1,
    'page_size' => 100,
    'start_time' => '2012-12-08 18:50:30',
    'end_time' => '2014-12-08 18:50:30',
);
$info = $test->result($params);
echo "<pre>";
print_r($info);
echo "</pre>";