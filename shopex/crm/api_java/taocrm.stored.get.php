<?php
$api_name = '客户预存款查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'','label'=>'客户ID','desc'=>'','type'=>'string','required'=>true),
  'shop_id' => array('value'=>'','label'=>'店铺Id','desc'=>'冗余字段','type'=>'string','required'=>false),
);

//返回结果
$api_response = array (
 'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'number','required'=>true),
  'stored_value' => array('value'=>'111','label'=>'预储值金额','desc'=>'','type'=>'dicemal','required'=>true),
);
?>