<?php
$api_name = '客户新增权益项';

//应用级输入参数
$api_params = array (
  'benefits_code' => array('value'=>'','label'=>'权益项代码','desc'=>'','type'=>'string','required'=>true),
  'benefits_name' => array('value'=>'','label'=>'权益项名称','desc'=>'','type'=>'string','required'=>true),
  'source' => array('value'=>'','label'=>'来源业务','desc'=>'','type'=>'string','required'=>true),
  'is_enable' => array('value'=>'1','label'=>'是否可用','desc'=>'(0：不可用，1:可用)','type'=>'int','required'=>true),
  'op_name' => array('value'=>'','label'=>'创建人','desc'=>'','type'=>'string','required'=>true),
  'op_time' => array('value'=>'','label'=>'创建时间','desc'=>'','type'=>'datetime','required'=>true),
);

//返回结果
$api_response = array (
  //'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
);
?>