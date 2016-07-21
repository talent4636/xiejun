<?php
$api_name = '一键返利';

//应用级输入参数
$api_params = array (
  'rebate_ids' => array('value'=>'','label'=>'返利周期报表ID','desc'=>'1,2,3,4','type'=>'string','required'=>true),
  'rebate_type' => array('value'=>'','label'=>'返利类型','desc'=>'1 金额，2积分 ','type'=>'string','required'=>true),
  'op_user' => array('value'=>'','label'=>'操作人','desc'=>'','type'=>'string','required'=>true),
);

//返回结果
$api_response = array (
'status' => array('value'=>'succ','label'=>'处理状态','desc'=>'','type'=>'string','required'=>true),
);
?>