<?php
$api_name = '客户历史订单查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true),
    'start_created_date' => array('value'=>'2015-8-20 16:48:18','label'=>'订单创建时间','desc'=>'','type'=>'string'),
  'shop_id' => array('value'=>'321321Fa','label'=>'店铺ID','desc'=>'','type'=>'string'),
  'page_size' => array('value'=>'5','label'=>'每页显示','desc'=>'','type'=>'int', 'required'=>true),
  'page' => array('value'=>'5','label'=>'页码','desc'=>'','type'=>'int', 'required'=>true),
);

//返回结果
$api_response = array (
    'orders' => array('value'=>'["order_bn":"321312","status":"1","pay_status":"1","ship_status":"1","shipping":"1","payment":"1","item_num":"1","skus":"1","createtime":"2015-8-20 17:55:23","pay_time":"2015-8-20 17:55:27","delivery_time":"2015-8-20 17:55:29","shop_id":"dasdas","ship_name":"sss","ship_area":"上海","ship_addr":"浦东","ship_zip":"201209","ship_tel":"0218931313","ship_mobile":"18818818888","cost_item":"22.2","total_amount":"33.3","pmt_goods":"","pmt_order":"22","payed":"22","custom_mark":"订单","mark_text":"订单",]','label'=>'订单结构','desc'=>'','type'=>'json'),
  'total_result' => array('value'=>'5','label'=>'总条数','desc'=>'','type'=>'string'),
);
?>