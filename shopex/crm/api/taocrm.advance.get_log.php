<?php
$api_name = '储值记录查询';

//应用级输入参数
$api_params = array (
    'member_id' => array('value'=>'2187053','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'page' => array('value'=>'1','label'=>'','desc'=>'','type'=>'money','required'=>true),
    'page_size' => array('value'=>'50','label'=>'','desc'=>'','type'=>'money','required'=>true),
);

//返回结果
$api_response = array (
  'crm_version' => array('value'=>'v2.2.7','label'=>'系统版本','desc'=>'','type'=>'string','required'=>true),
  'system_version' => array('value'=>'High_Ver','label'=>'系统类型','desc'=>'High_Ver 企业版,Pro_Ver 旗舰版','type'=>'string','required'=>true),
);
?>