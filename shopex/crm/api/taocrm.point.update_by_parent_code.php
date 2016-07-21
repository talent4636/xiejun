<?php
$api_name = '根据推荐码更新积分接口';

//应用级输入参数
$api_params = array (
  'register_crm_member_id' => array('value'=>54,'label'=>'注册人CRM会员ID','desc'=>'','type'=>'int','required'=>true),
  'parent_code' => array('value'=>1000000009,'label'=>'推荐人的推荐码','desc'=>'','type'=>'int','required'=>true),
  'point' => array('value'=>10,'label'=>'积分修改值','desc'=>'','type'=>'int','required'=>true),
);

//返回结果
$api_response = array (
  'register_crm_member_id' => array('value'=>54,'label'=>'注册人CRM会员ID','desc'=>'','type'=>'int','required'=>true),
);
?>