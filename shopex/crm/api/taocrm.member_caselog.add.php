<?php
$api_name = '客户服务记录添加';

//应用级输入参数
$api_params = array (
  'customer' => array('value'=>'张先生','label'=>'姓名','desc'=>'','type'=>'string','required'=>true),
  'mobile' => array('value'=>'13512345467','label'=>'手机','desc'=>'','type'=>'string','required'=>true),
  //'telephone' => array('value'=>'','label'=>'电话','desc'=>'','type'=>'string','required'=>true),
  'category' => array('value'=>'售后','label'=>'分类','desc'=>'','type'=>'string','required'=>true),
  'source' => array('value'=>'呼入','label'=>'来源','desc'=>'','type'=>'string','required'=>true),
  'media' => array('value'=>'电话','label'=>'媒体','desc'=>'','type'=>'string','required'=>true),
  'status' => array('value'=>'已完成','label'=>'状态','desc'=>'','type'=>'string','required'=>true),
  'agent' => array('value'=>'客服01','label'=>'客服','desc'=>'','type'=>'string','required'=>true),
  'service_time' => array('value'=>'2015-10-10 12:56:31','label'=>'服务时间','desc'=>'','type'=>'datetime','required'=>true),
  'service_content' => array('value'=>'来电咨询售后服务网点的地址','label'=>'服务内容','desc'=>'','type'=>'string','required'=>true),
  'caselog_id' => array('value'=>'1','label'=>'服务记录ID','desc'=>'','type'=>'number','required'=>false),
);

//返回结果
$api_response = array (
  'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'number','required'=>true),
  'caselog_id' => array('value'=>'1234','label'=>'服务记录ID','desc'=>'','type'=>'number','required'=>true),
);
?>