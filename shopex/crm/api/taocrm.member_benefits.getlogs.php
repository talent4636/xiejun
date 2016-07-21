<?php
$api_name = '查询客户权益账户变更明细';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
  'start_date' => array('value'=>'','label'=>'开始时间','desc'=>'','type'=>'datetime','required'=>true),
  'end_date' => array('value'=>'','label'=>'结束时间','desc'=>'','type'=>'datetime','required'=>true),
);

//返回结果
$api_response = array (
  //'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
);
?>