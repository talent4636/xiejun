<?php
$api_name = '积分日志查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'12','label'=>'用户ID','desc'=>'','type'=>'int','required'=>true),
  'shop_id' => array('value'=>'a2fdas2','label'=>'店铺ID','desc'=>'','type'=>'string'),
  'page_size' => array('value'=>'5','label'=>'每页显示','desc'=>'','type'=>'int','required'=>true),
  'page' => array('value'=>'5','label'=>'页码','desc'=>'从1开始','type'=>'int','required'=>true),
  'node_id' => array('value'=>'1231das','label'=>'节点id','desc'=>'','type'=>'string'),
  'p_type' => array('value'=>'','label'=>'积分日志类型，+，-，null','desc'=>'','type'=>'string'),
 );

//返回结果
$api_response = array (

    'list' => array('value'=>'[{"point_type":"312312xx","op_time":"2015-8-20 17:47:51","op_before_point":"22","op_after_point":"33","point":"11","point_mode":"1","freeze_time":"2015-8-20 17:48:10","unfreeze_time":"2015-8-20 17:48:14","shop_id":"dsdsaaa","is_expired":"0","expired_time":"2015-8-20 17:48:43","point_desc":"sss"}]','label'=>'积分历史列表','desc'=>'0:增加积分，1扣除积分；0:未过期，1过期','type'=>'json','required'=>true),
    'total_result' => array('value'=>'5000','label'=>'总数','desc'=>'','type'=>'int','required'=>true),

);
?>