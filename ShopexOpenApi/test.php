<?php

//鐢熸垚绛惧悕绠楁硶
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

$params = array(
    #'method'=>'b2c.goods.basic.get_cat',
    #'method'=>'b2c.goods.get_all_list',
    #'method'=>'b2c.goods.get_goods_detail',
    #'method'=>'b2c.goods.active.get_list',
    'method'=>'b2c.goods.active.get_active_gallery',
    #'uname'=>'test',
    #'product_id'=>'143',
    'special_id'=>'1',
    #'password'=>'123456',
    #'date'=>'2016-06-06 09:06:05',
    #'direct'=>'true',
);
foreach($params as $k => $v){
    echo $k."=".$v."\n";
}
$token = '29720e9dd365b8b201bd2d305158f293d1494ac55f74d52058726fbec1bb0947';
$token_local = '';
$test = strtoupper(md5(strtoupper(md5(assemble($params))).$token));
$test_local = strtoupper(md5(strtoupper(md5(assemble($params))).$token_local));
echo "test_sign:$test\n";
echo "local_sign:$test_local\n";


