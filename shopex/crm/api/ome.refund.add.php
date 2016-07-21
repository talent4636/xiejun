<?php
$api_name = '退款单增加';

//应用级输入参数
$api_params = array (
  'refund_id' => array('value'=>'51546280597978','label'=>'退款单编号','desc'=>'','type'=>'string','required'=>true),
  'good_status' => array('value'=>'BUYER_NOT_RECEIVED','label'=>'货品状态','desc'=>'BUYER_NOT_RECEIVED 买家没收到货物','type'=>'string'),
  'tid' => array('value'=>'1212638728317879','label'=>'订单编号','desc'=>'','type'=>'string'),
  'has_good_return' => array('value'=>'False','label'=>'是否需要退货','desc'=>'true / false','type'=>'bool'),
  'desc' => array('value'=>'','label'=>'退款单备注','desc'=>'','type'=>'string'),
  'status' => array('value'=>'CLOSED','label'=>'退款单状态','desc'=>'CLOSED 已关闭','type'=>'string', 'required'=>true),
  'logistics_company' => array('value'=>'','label'=>'物流公司','desc'=>'','type'=>'string'),
  'logistics_no' => array('value'=>'','label'=>'物流单号','desc'=>'','type'=>'string'),
  'reason' => array('value'=>'','label'=>'退款原因','desc'=>'','type'=>'string'),
  'refund_fee' => array('value'=>'59.40','label'=>'退款金额','desc'=>'','type'=>'money', 'required'=>true),
  'total_fee' => array('value'=>'89.00','label'=>'订单总金额','desc'=>'','type'=>'money', 'required'=>true),
  'buyer_nick' => array('value'=>'yoyo口口','label'=>'买家帐号','desc'=>'','type'=>'string'),
  'created' => array('value'=>'2015-08-19 14:56:06','label'=>'退款申请时间','desc'=>'','type'=>'datetime', 'required'=>true),
  'modified' => array('value'=>'2015-08-19 17:37:37','label'=>'退款单更新时间','desc'=>'','type'=>'datetime', 'required'=>true),
);

//返回结果
$api_response = array (
  'tid' => array('value'=>'20131205115680','label'=>'订单编号','desc'=>'','type'=>'string','required'=>true),
);
?>