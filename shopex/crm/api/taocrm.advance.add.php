<?php
$api_name = '储值记录新增';

//应用级输入参数
$api_params = array (
    'explode_money' => array('value'=>'0','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'import_money' => array('value'=>'100','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'member_id' => array('value'=>'2187053','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'message' => array('value'=>'这是测试'.date('H-i-s'),'label'=>'','desc'=>'','type'=>'money','required'=>true),
    'order_id' => array('value'=>'aoc123','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'payment_id' => array('value'=>'apc123','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'sn' => array('value'=>'0','label'=>'','desc'=>'','type'=>'money','required'=>true),
);

//返回结果
$api_response = array (
  'crm_version' => array('value'=>'v2.2.7','label'=>'系统版本','desc'=>'','type'=>'string','required'=>true),
  'system_version' => array('value'=>'High_Ver','label'=>'系统类型','desc'=>'High_Ver 企业版,Pro_Ver 旗舰版','type'=>'string','required'=>true),
);
?>