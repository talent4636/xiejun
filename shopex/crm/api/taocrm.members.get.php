<?php
$api_name = '客户信息查询';

//应用级输入参数
$api_params = array (
  'member_id' => array('value'=>'123','label'=>'客户ID','desc'=>'','type'=>'int','required'=>true)
);

//返回结果
$api_response = array (
    'member' => array('value'=>'["uname":"dsdsds","real_name":"阿花","consumer_terminal":"ecshop","zip":"201209","state":"上海","city":"上海","district":"徐汇","address":"桂林路396","mobile":"18818818888","email":"aaa@qq.com","birthday":"19940519","sex":"1","is_vip":"1","is_sms_black":"1","is_email_black":"1","alipay":"18818888888","remark":"sss","self_code":"123123"]','label'=>'客户结构','desc'=>'','type'=>'json'),
   );
?>