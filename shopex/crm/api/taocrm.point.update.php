<?php
$api_name = '积分更新';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
  'shop_id' => array('value'=>'','label'=>'店铺ID','desc'=>' ','type'=>'string'),
    'point' => array('value'=>'','label'=>'积分修改值','desc'=>'当全量更新积分时，point必须为大于等于0的正整数；当增量更新积分时，point为整数，可小于等于0。若增量更新时传入的积分为负数，则负数与实际积分之和不能小于0。比如当前实际积分为1，传入增量更新point=-1，积分改为0','type'=>'int'),
    'type' => array('value'=>'1','label'=>'更新类型','desc'=>'1：全量更新 2：增量更新','type'=>'number', 'required'=>true),
    'point_desc' => array('value'=>'xxx','label'=>'积分类型描述','desc'=>'','type'=>'string', 'required'=>true),
 );

//返回结果
$api_response = array (
  'member_id' => array('value'=>'12','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
);
?>