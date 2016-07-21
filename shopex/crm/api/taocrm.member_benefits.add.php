<?php
$api_name = '新增客户储值权益';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
  'benefits_type' => array('value'=>'0','label'=>'权益类型','desc'=>'0：金额
1：计次
2：折扣
3：其他
','type'=>'int','required'=>true),
  'get_benefits_mode' => array('value'=>'0','label'=>'获取权益方式','desc'=>'0：收费
1：赠送
2：其他
','type'=>'int','required'=>true),
  'op_mode' => array('value'=>'0','label'=>'新增或扣减权益','desc'=>'0：新增
1：扣减(使用)
','type'=>'int','required'=>true),
  'get_benefits_desc' => array('value'=>'','label'=>'获取权益说明','desc'=>'','type'=>'string','required'=>false),
  'benefits_code' => array('value'=>'','label'=>'权益项代码','desc'=>'','type'=>'string','required'=>true),
  'benefits_name' => array('value'=>'','label'=>'权益项名称','desc'=>'','type'=>'string','required'=>true),
  'nums' => array('value'=>'11.11','label'=>'权益值','desc'=>'(金额或者次数或者折扣)','type'=>'number','required'=>true),
  'effectie_time' => array('value'=>'2015-10-10','label'=>'生效时间','desc'=>'','type'=>'date','required'=>true),
  'failure_time' => array('value'=>'','label'=>'失效时间','desc'=>'(不填就是永久有效)','type'=>'date','required'=>false),
  'is_enable' => array('value'=>'1','label'=>'是否可用','desc'=>'0：可用
1：不可用
','type'=>'int','required'=>true),
  'source_order_bn' => array('value'=>'','label'=>'来源关联单号','desc'=>'','type'=>'string','required'=>false),
  'source_business_code' => array('value'=>'易开店','label'=>'来源业务Code','desc'=>'LQ、易开店','type'=>'string','required'=>false),
  'source_business_name' => array('value'=>'','label'=>'来源业务名称','desc'=>'','type'=>'string','required'=>false),
  'source_store_name' => array('value'=>'','label'=>'来源门店代码','desc'=>'','type'=>'string','required'=>false),
  'source_terminal_code' => array('value'=>'','label'=>'来源终端代码','desc'=>'','type'=>'string','required'=>false),
  'memo' => array('value'=>'','label'=>'说明备注','desc'=>'','type'=>'string','required'=>false),
  'op_name' => array('value'=>'','label'=>'创建人','desc'=>'','type'=>'string','required'=>true),
  'op_time' => array('value'=>'2015-10-10 11:58:56','label'=>'创建时间','desc'=>'','type'=>'datetime','required'=>true),
);

//返回结果
$api_response = array (
  //'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
);
?>