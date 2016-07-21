<?php
$api_name = '积分查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'12321','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
 );

//返回结果
$api_response = array (
    'shop_point_list' => array('value'=>'["shop_id":"asdas2","node_id":"143125810","points":"55","total_point":"55",]','label'=>'客户所有类型积分列表','desc'=>'','type'=>'json','required'=>true),
);
?>