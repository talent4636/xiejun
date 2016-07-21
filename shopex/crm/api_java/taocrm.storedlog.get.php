<?php
$api_name = '客户预储值日志查询';

//应用级输入参数
$api_params = array (
   'member_id' => array('value'=>'','label'=>'客户ID','desc'=>'','type'=>'string','required'=>true),
  'shop_id' => array('value'=>'','label'=>'店铺Id','desc'=>'冗余字段','type'=>'string','required'=>false),
);

//返回结果
$api_response = array (
  'logList' => array('value'=>'[{"log_id":"1","member_id":"11","uname":"ww","mobile":"mm","value_time":"1420041600","change_amount":"1.1","before_change_amount":"1.8","after_change_amount":"0.7","remark":"dsdsaaa","op_user":"zs"}]','label'=>'客户预储值日志列表','desc'=>'','type'=>'json','required'=>true),
 
);
?>