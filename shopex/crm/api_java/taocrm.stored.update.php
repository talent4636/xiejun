<?php
$api_name = '客户预存款更新';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
  'shop_id' => array('value'=>'','label'=>'店铺ID','desc'=>' ','type'=>'string','required'=>true),
  'stored_value' => array('value'=>'','label'=>'预储值金额','desc'=>'预储值金额大于0则增加，预储值金额小于0则减少','type'=>'decimal','required'=>true),
  'remark' => array('value'=>'','label'=>'备注','desc'=>'','type'=>'string', 'required'=>true),
  'op_user' => array('value'=>'xxx','label'=>'操作人','desc'=>'','type'=>'string', 'required'=>true),
  'uname' => array('value'=>'12321dd','label'=>'操作客户名称','desc'=>'','type'=>'string'),
  'mobile' => array('value'=>'18000000000','label'=>'操作客户手机号','desc'=>'','type'=>'string'),
 
);

//返回结果
$api_response = array (
   'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'number','required'=>true),
);
?>