<?php
$api_name = '客户列表查询';

//应用级输入参数
$api_params = array (
  'start_update_date' => array('value'=>'2015年8月20日16:16:46','label'=>'客户更新时间(开始时间)','desc'=>'','type'=>'string','required'=>true),
  'end_update_date' => array('value'=>'2015年8月20日16:16:50','label'=>'客户更新时间(结束时间，与start_update_date组成一个时间段)','desc'=>'','type'=>'string'),
  'start_created_date' => array('value'=>'2015年8月20日16:16:52','label'=>'客户创建时间(开始时间)','desc'=>'','type'=>'string'),
  'end_created_date' => array('value'=>'2015年8月20日16:16:58','label'=>'客户创建时间(结束时间，与start_created_date组成一个时间段)','desc'=>'','type'=>'string'),
  'page_size' => array('value'=>'5','label'=>'每页显示','desc'=>'','type'=>'int', 'required'=>true),
  'page' => array('value'=>'5','label'=>'页码','desc'=>'','type'=>'int', 'required'=>true),

);

//返回结果
$api_response = array (
    'members' => array('value'=>'["uname":"dsdsds","real_name":"阿花","consumer_terminal":"ecshop","zip":"201209","state":"上海","city":"上海","district":"徐汇","address":"桂林路396","mobile":"18818818888","email":"aaa@qq.com","birthday":"19940519","sex":"1","is_vip":"1","is_sms_black":"1","is_email_black":"1","alipay":"18818888888","remark":"sss","self_code":"123123"]','label'=>'客户结构','desc'=>'','type'=>'json'),
);
?>