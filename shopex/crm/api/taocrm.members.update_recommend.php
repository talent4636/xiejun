<?php
$api_name = '更新推荐关系接口';

//应用级输入参数
$api_params = array (
  'referee_member_id' => array('value'=>54,'label'=>'推荐人会员ID','desc'=>'','type'=>'int','required'=>true),
  'recommended_member_ids' => array('value'=>'["10","12"]','label'=>'被推荐会员ID数组','desc'=>'','type'=>'string','required'=>true),
);

//返回结果
$api_response = array (
  'referee_member_id' => array('value'=>54,'label'=>'推荐人会员ID','desc'=>'','type'=>'int','required'=>true),
);
?>