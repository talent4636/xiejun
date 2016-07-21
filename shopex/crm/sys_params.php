<?php


//系统级别输入参数
$sys_params = array (
  'method' => array('value'=>'store.trade.add','label'=>'API接口名称','desc'=>'','type'=>'string','required'=>true),
  'node_id' => array('value'=>'1530353732','label'=>'店铺节点ID','desc'=>'在我的店铺菜单下查看','type'=>'string','required'=>true),
  'format' => array('value'=>'json','label'=>'指定响应格式','desc'=>'默认json,目前支持格式为xml,json','type'=>'string','required'=>true),
  'v' => array('value'=>'1.0','label'=>'接口版本','desc'=>'','type'=>'string','required'=>true),
  'sign' => array('value'=>'','label'=>'API输入参数签名结果','desc'=>'','type'=>'string','required'=>true),
);
?>