<?php
$api_name = '积分查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'','label'=>'会员ID','desc'=>'根据会员ID判断查询某个会员的积分信息','type'=>'int','required'=>true),
  'shop_id' => array('value'=>'','label'=>'店铺ID','desc'=>'根据店铺ID判断是全局积分还是店铺积分','type'=>'string','required'=>false),
  'node_id' => array('value'=>'','label'=>'节点ID','desc'=>'冗余参数','type'=>'string','required'=>false),
);

//返回结果
$api_response = array (
    
	'list' => array('value'=>'["shop_id":"asdas2","node_id":"dasdas","points":"55"]','label'=>'客户所有类型积分列表','desc'=>'','type'=>'json','required'=>true),
	'total_point' => array('value'=>'5000','label'=>'总数','desc'=>'','type'=>'int','required'=>true),
	);
?>